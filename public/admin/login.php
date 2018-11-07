<?php
require_once('../../private/initialize.php');

$name = '';
$password = '';
//Amadiaustin.1@
//Emetowinner.22@
if(is_post_request()) {

  $name = $_POST['name'] ?? '';
  $password = $_POST['password'] ?? '';

  // Validations
  if(is_blank($name)) {
    $errors[] = "Username cannot be blank.";
  }
  if(is_blank($password)) {
    $errors[] = "Password cannot be blank.";
  }
  if(empty($errors)){
    $admin = find_admin_by_name($name);
      if($admin){
          if(password_verify($password , $admin['password'])){
              log_in_admin($admin);
              redirect_to(url_for('admin/index.php'));
          }else{
            //username found but password does not match
            $errors[] = "log in not successful";
            
          }
      }
      else{
        //no username was found
         $errors[] = "log in not successful";
            
      }
  }

}

?>

<?php $page_title = 'Log in'; ?>
<?php include(SHARED_PATH . '/admin_header.php'); ?>

<div id="content">
  <h1>Log in</h1>

  <?php echo display_errors($errors); ?>

  <form action="login.php" method="post">
    Name:<br />
    <input type="text" name="name" value="<?php echo h($name); ?>" /><br />
    Password:<br />
    <input type="password" name="password" value="" /><br />
    <input type="submit" name="submit" value="Submit"  />
  </form>

</div>

<?php include(SHARED_PATH . '/admin_footer.php'); ?>
