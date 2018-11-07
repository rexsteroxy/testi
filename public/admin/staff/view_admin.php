<?php
require_once('../../../private/initialize.php');
require_login();

$admins = find_all_admin();

$page_title = 'admin view';
include(SHARED_PATH . '/admin_header.php');


?>

	
    <div id="content">
  <div class="admins listing">
    <h1>REGISTERD ADMINS</h1>

    <div class="actions">
      <a class="action" href="<?php echo url_for('/admin/index.php')?>">GO TO THE MAIN MENU</a>
    </div>


<h2>Welcome to Admin PAGE</h2>
<table class="list">
	<tr>
		<th>ID</th>
		<th>NAME</th>
		<th>EMAIL</th>
		<th>TIME</th>
		<th>&nbsp;</th>
  	    <th>&nbsp;</th>
        <th>&nbsp;</th>
        <th>&nbsp;</th>
	</tr>
	<?php while($admin = mysqli_fetch_assoc($admins)) {?>
		<tr>
			<td><?php echo h($admin['id']); ?></td>
			<td><?php echo h($admin['name']); ?></td>
			<td><?php echo h($admin['email']); ?></td>
			<td><?php echo $admin['time']; ?></td>
			<td><a class="action" href="<?php echo url_for('/admin/staff/show_admin.php?id=' . $admin['id']) ;?>">CLICK TO VIEW</a></td>
			<td><a class="action" href="<?php echo url_for('/admin/staff/edit_admin.php?id=' . $admin['id']) ;?>">CLICK TO EDIT</a></td>
			<td><a class="action" href="<?php echo url_for('/admin/staff/delete_admin.php?id='. h(u($admin['id'])))?>">CLICK TO DELETE</a></td>
			<td><a class="action" href="<?php echo url_for('/admin/staff/create_admin.php') ;?>">CREATE NEW ADMIN</a></td>
		</tr>
	<?php }?>
</table>

<?php
  mysqli_free_result($admins);
 ?>

</div>
</div>


<?php include(SHARED_PATH . '/admin_footer.php');?>