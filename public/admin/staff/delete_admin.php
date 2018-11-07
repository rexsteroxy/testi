<?php

require_once('../../../private/initialize.php');
require_login();
if(!isset($_GET['id'])) {
  redirect_to(url_for('/admin/index.php'));
}
$id = $_GET['id'];

if(is_post_request()) {

  $result = delete_admin($id);
  redirect_to(url_for('/admin/staff/view_admin.php'));

} else {
  $admin = find_one_admin($id);
}

?>

<?php $page_title = 'Delete admin'; ?>
<?php include(SHARED_PATH . '/admin_header.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/admin/staff/view_admin.php'); ?>">&laquo; Back to List</a>

  <div class="admin delete">
    <h1>Delete admin</h1>
    <p>Are you sure you want to delete this admin?</p>
    <p class="item"><?php echo h($admin['name']); ?></p>

    <form action="<?php echo url_for('/admin/staff/delete_admin.php?id=' . h(u($admin['id']))); ?>" method="post">
      <div id="operations">
        <input type="submit" name="commit" value="Delete admin" />
      </div>
    </form>
  </div>

</div>

<?php include(SHARED_PATH . '/admin_footer.php'); ?>
