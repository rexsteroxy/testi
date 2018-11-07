<?php
require_once('../../../private/initialize.php');
require_login();
$sales = find_all_sales();

$page_title = 'view sales';
include(SHARED_PATH . '/admin_header.php');


?>

	
    <div id="content">
  <div class="sales listing">
    <h1>SALES LISTING</h1>

    <div class="actions">
      <a class="action" href="<?php echo url_for('/admin/index.php')?>">GO TO THE MAIN MENU</a>
    </div>


<h2>Welcome to Admin sales</h2>
<table class="list">
	<tr>
		<th>ID</th>
		<th>NAME</th>
		<th>NUMBER</th>
		<th>EMAIL</th>
		<th>ORDER</th>
		<th>TIME</th>
		<th>&nbsp;</th>
  	    <th>&nbsp;</th>
        <th>&nbsp;</th>
	</tr>
	<?php while($sale = mysqli_fetch_assoc($sales)) {?>
		<tr>
			<td><?php echo h($sale['id']); ?></td>
			<td><?php echo h($sale['name']); ?></td>
			<td><?php echo h($sale['number']); ?></td>
			<td><?php echo h($sale['email']); ?></td>
			<td><?php echo h($sale['orders']); ?></td>
			<td><?php echo $sale['time']; ?></td>
			<td><a class="action" href="<?php echo url_for('/admin//order/show_orders.php?id=' . $sale['id']) ;?>">CLICK TO VIEW</a></td>
			<td><a class="action" href="<?php echo url_for('/admin/order/delete_orders.php?id='. h(u($sale['id'])))?>">CLICK TO DELETE</a></td>
		</tr>
	<?php }?>
</table>

<?php
  mysqli_free_result($sales);
 ?>

</div>
</div>


<?php include(SHARED_PATH . '/admin_footer.php');?>