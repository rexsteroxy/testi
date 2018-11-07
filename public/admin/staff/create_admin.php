<?php
require_once('../../../private/initialize.php');
require_login();
$page_title = "admin_homepage";
include_once(SHARED_PATH .'/admin_header.php');

if(is_post_request()){
  $admin=[];
  $admin['name'] = $_POST['name'] ?? '';
  $admin['email'] = $_POST['email'] ?? '';
  $admin['password'] = $_POST['password'] ?? '';
  $admin['confirm_password'] = $_POST['password_2'] ?? '';


  $result=insert_admin($admin);
  if ($result === true){
    $_SESSION['message']= 'Admin created successful';
  redirect_to(url_for('/admin/staff/view_admin.php'));
 }
 else{
  $errors = $result;
 }
}
else{
  //display the blank form
}
?>

    <div id="content">
      <a class="back-link" href="<?php echo url_for('/admin/staff/view_admin.php'); ?>">&laquo; Back to List</a>

  <div class="admin edit">
    <h1>Create New Admin</h1>

    <?php echo display_errors($errors);?>

    <form action="<?php echo url_for('/admin/staff/create_admin.php'); ?>" method="post">
      <dl>
        <dt>Name</dt>
        <dd><input type="text" name="name" /></dd>
      </dl>
      <dl>
        <dt>Email</dt>
        <dd><input type="text" name="email" /></dd>
      </dl>
      <dl>
        <dt>Password</dt>
        <dd><input type="password" name="password" /></dd>
      </dl>
      <dl>
        <dt> Confirm_Password</dt>
        <dd><input type="password" name="password_2" /></dd>
      </dl>
     
      <div id="operations">
        <input type="submit"  value="Submit" />
      </div>
    </form>

  </div>
 
    </div>

<?php include_once(SHARED_PATH .'/admin_footer.php') ; ?>