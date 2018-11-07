<?php

require_once('../../../private/initialize.php');
require_login();
if(!isset($_GET['id'])) {
  redirect_to(url_for('/admin/order/show.php'));
}
$id = $_GET['id'];

if(is_post_request()) {

  $result = delete_order($id);
  redirect_to(url_for('/admin/order/view_orders.php'));

} else {
  $order = find_one_order($id);
}

?>

<?php $page_title = 'Delete order'; ?>
<?php include(SHARED_PATH . '/admin_header.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/admin/order/view_orders.php'); ?>">&laquo; Back to List</a>

  <div class="order delete">
    <h1>Delete order</h1>
    <p>Are you sure you want to delete this order?</p>
    <p class="item"><?php echo h($order['name']); ?></p>

    <form action="<?php echo url_for('/admin/order/delete_orders.php?id=' . h(u($order['id']))); ?>" method="post">
      <div id="operations">
        <input type="submit" name="commit" value="Delete order" />
      </div>
    </form>
  </div>

</div>

<?php include(SHARED_PATH . '/admin_footer.php'); ?>
