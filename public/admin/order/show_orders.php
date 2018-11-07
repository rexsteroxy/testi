<?php
require_once('../../../private/initialize.php');
require_login();
$page_title = "show orders";
include(SHARED_PATH . "/admin_header.php");
$id = $_GET['id'] ?? 'welcome';

$order = find_one_order($id);
 

  
?>
<div id="content">
 <div class="actions">
      <a class="action" href="<?php echo url_for('/admin/order/view_orders.php')?>">back to list</a>
</div>

<div class="order show">

    <h1>order: <?php echo h($order['name']); ?></h1>

    <div class="attributes">
      <dl>
        <dt>Name</dt>
        <dd><?php echo h($order['name']); ?></dd>
      </dl>
      <dl>
        <dt>Email</dt>
        <dd><?php echo h($order['number']); ?></dd>
      </dl>
      <dl>
        <dt>Subject</dt>
        <dd><?php echo h($order['email']); ?></dd>
      </dl>
      <dl>
        <dt>Message</dt>
        <dd><?php echo h($order['orders']); ?></dd>
      </dl>
      <dl>
        <dt>Time</dt>
        <dd><?php echo $order['time'] ; ?></dd>
      </dl>
    </div>

  </div>

</div>


<?php include(SHARED_PATH . "/admin_footer.php");?>