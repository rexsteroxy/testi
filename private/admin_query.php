<?php
//for the contact pages
function find_all_contact(){
	global $db;

	$sql = "SELECT * FROM contact ";
	$sql .= "ORDER BY id ASC";
	$result = mysqli_query($db, $sql);
	confirm_result_set($result);
	return $result;
}
function find_one_record($id){
	global $db;
  
	$sql = "SELECT * FROM contact ";
	$sql .= "WHERE id='".$id."'";
	$result = mysqli_query($db, $sql);
	confirm_result_set($result);
	$contact=mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    return $contact;
}

function delete_contact($id) {
    global $db;

    $sql = "DELETE FROM contact ";
   $sql .= "WHERE id='" . $id ."'";
    $sql .= "LIMIT 1";
    $result = mysqli_query($db, $sql);

    // For DELETE statements, $result is true/false
    if($result) {
      return true;
    } else {
      // DELETE failed
      echo mysqli_error($db);
      db_disconnect($db);
      exit;
    }
  } 
  //this is for the sales code

  function find_all_sales(){
	global $db;

	$sql = "SELECT * FROM sales ";
	$sql .= "ORDER BY id ASC";
	$sale = mysqli_query($db, $sql);
	confirm_result_set($sale);
	return $sale;
}

function find_one_order($id){
	global $db;
  
	$sql = "SELECT * FROM sales ";
	$sql .= "WHERE id='".$id."'";
	$result = mysqli_query($db, $sql);
	confirm_result_set($result);
	$order=mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    return $order;
}

function delete_order($id) {
    global $db;

    $sql = "DELETE FROM sales ";
   $sql .= "WHERE id='" . $id ."'";
    $sql .= "LIMIT 1";
    $result = mysqli_query($db, $sql);

    // For DELETE statements, $result is true/false
    if($result) {
      return true;
    } else {
      // DELETE failed
      echo mysqli_error($db);
      db_disconnect($db);
      exit;
    }
  } 

  ///this is for the admin area cod

function find_all_admin(){
  global $db;

  $sql = "SELECT * FROM admin ";
  $sql .= "ORDER BY id ASC";
  $admin = mysqli_query($db, $sql);
  confirm_result_set($admin);
  return $admin;
}

function find_one_admin($id){
  global $db;
  
  $sql = "SELECT * FROM admin ";
  $sql .= "WHERE id='". db_escape($db,$id)."'";
  $result = mysqli_query($db, $sql);
  confirm_result_set($result);
  $admin=mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    return $admin;
}
function find_admin_by_name($name){
  global $db;
  
  $sql = "SELECT * FROM admin ";
  $sql .= "WHERE name='". db_escape($db, $name)."'";
  $sql .= "LIMIT 1";
  $result = mysqli_query($db, $sql);
  confirm_result_set($result);
  $admin=mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    return $admin;
}


function delete_admin($id) {
    global $db;

    $sql = "DELETE FROM admin ";
   $sql .= "WHERE id='" . db_escape($db,$id) ."'";
    $sql .= "LIMIT 1";
    $result = mysqli_query($db, $sql);

    // For DELETE statements, $result is true/false
    if($result) {
      return true;
    } else {
      // DELETE failed
      echo mysqli_error($db);
      db_disconnect($db);
      exit;
    }
  } 

  function validate_admin($admin) {
    $errors = [];

    // admin_name
    if(is_blank($admin['name'])) {
      $errors[] = "Name cannot be blank.";
    } elseif(!has_length($admin['name'], ['min' => 2, 'max' => 255])) {
      $errors[] = "Name must be between 2 and 255 characters.";
    }
    elseif (!has_unique_name($admin['name'], $admin['id'] ?? 0)) {
      $errors[] = "Name not allowed. Try another.";
    }

    if(is_blank($admin['email'])) {
      $errors[] = "Email cannot be blank.";
    } 
     elseif (!has_valid_email_format($admin['email'])) {
      $errors[] = "Email must be a valid format.";
    }

    
      if(is_blank($admin['password'])) {
        $errors[] = "Password cannot be blank.";
      } elseif (!has_length($admin['password'], array('min' => 12))) {
        $errors[] = "Password must contain 12 or more characters";
      } elseif (!preg_match('/[A-Z]/', $admin['password'])) {
        $errors[] = "Password must contain at least 1 uppercase letter";
      } elseif (!preg_match('/[a-z]/', $admin['password'])) {
        $errors[] = "Password must contain at least 1 lowercase letter";
      } elseif (!preg_match('/[0-9]/', $admin['password'])) {
        $errors[] = "Password must contain at least 1 number";
      } elseif (!preg_match('/[^A-Za-z0-9\s]/', $admin['password'])) {
        $errors[] = "Password must contain at least 1 symbol";
      }

      if(is_blank($admin['confirm_password'])) {
        $errors[] = "Confirm password cannot be blank.";
      } elseif ($admin['password'] !== $admin['confirm_password']) {
        $errors[] = "Password and confirm password must match.";
      }
    
    return $errors;
  }

function edith_admin($admin,$id){

  global $db;

  $errows = validate_admin($admin);
  if(!empty($errows)){
    return $errows;
  }

$hashed_password = password_hash($admin['password'], PASSWORD_BCRYPT);

  $sql = "UPDATE admin SET ";
  $sql .= "name='" . db_escape($db, $admin['name']) ."',";
  $sql .= "email='" . db_escape($db, $admin['email'])."',";
  $sql .= "password='" . db_escape($db, $hashed_password)."'";
  $sql .= "WHERE id='" . $id ."'";
  $sql .= "LIMIT 1";


  $result = mysqli_query($db, $sql);
  confirm_result_set($result);
  if($result){
    return true;
  }else{
    echo mysqli_error($db);
      db_disconnect($db);
      exit;
  }
  }
function insert_admin($admin){
  global $db;

$errows = validate_admin($admin);
 if(!empty($errows)){
    return $errows;
  }

  $hashed_password = password_hash($admin['password'], PASSWORD_BCRYPT);
  $c_hashed_password = password_hash($admin['confirm_password'], PASSWORD_BCRYPT);

  $sql = "INSERT INTO admin ";
  $sql .= "(name,email,password,confirm_password)";
  $sql .= "VALUES (";
  $sql .= "'" . db_escape($db, $admin['name']). "',";
  $sql .= "'" . db_escape($db, $admin['email']). "',";
  $sql .= "'" . db_escape($db, $hashed_password). "',";
  $sql .= "'" . db_escape($db, $c_hashed_password). "'";
  $sql .= ")";

  $result = mysqli_query($db, $sql);
  confirm_result_set($result);

  if($result){
  echo "<script> alert('Registeration Successful') </script>";
  echo"<script>window.open('view_admin.php','_self')</script>";
   }

  else{
    echo mysqli_error($db);
    db_disconnect($db);
    exit;
}
}


?>