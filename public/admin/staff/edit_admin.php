<?php
require_once('../../../private/initialize.php');
require_login();
if(!isset($_GET['id'])){
  redirect_to(url_for('/admin/index.php'));
}

$id = $_GET['id'];


if(is_post_request()){
$admin=[];
$admin['name'] = $_POST['name'] ?? '';
$admin['email'] = $_POST['email'] ?? '';
$admin['password']= $_POST['password'] ?? '';
$admin['confirm_password'] = $_POST['password_2'] ?? '';

$result = edith_admin($admin,$id);
if ($result === true){
   $_SESSION['message']= 'Admin edited successful';
  redirect_to(url_for('/admin/staff/show_admin.php?id=' .$id));
}else{
  $errors = $result;
  //echo var_dump($errows);
}


}else{
  $admin = find_one_admin($id);

    $admin_set = find_all_admin();
    $admin_count = mysqli_num_rows($admin_set);
    mysqli_free_result($admin_set);
}



?>

<?php $page_title = ' edit admin'; ?>
<?php include(SHARED_PATH . '/admin_header.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/admin/staff/view_admin.php'); ?>">&laquo; Back to List</a>

  <div class="admin edit">
    <h1>Edit admins</h1>

    <?php echo display_errors($errors) ?>

    <form action="<?php echo url_for('/admin/staff/edit_admin.php?id='. h(u($id))); ?>" method="post">
      <dl>
        <dt>Name</dt>
        <dd><input type="text" name="name" value="<?php echo h($admin['name']) ?>"/></dd>
      </dl>
      <dl>
        <dt>Email</dt>
        <dd><input type="text" name="email" value="<?php echo h($admin['email']) ?>"/></dd>
      </dl>
      <dl>
        <dt>Password</dt>
        <dd><input type="password"  name="password" value=""/></dd>
      </dl>
      <dl>
        <dt>Confirm_Password</dt>
        <dd><input type="password" name="password_2" value=""/></dd>
      </dl>
     
      <div id="operations">
        <input type="submit"  value="Edit admin" />
      </div>
    </form>

  </div>
 
</div>

<?php include(SHARED_PATH . '/admin_footer.php'); ?>
