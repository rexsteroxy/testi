<?php
require_once('../../../private/initialize.php');
require_login();
$contacts = find_all_contact();

$page_title = 'view contacts';
include(SHARED_PATH . '/admin_header.php');


?>

	
    <div id="content">
  <div class="contacts listing">
    <h1>CONTACT LISTING</h1>

    <div class="actions">
      <a class="action" href="<?php echo url_for('/admin/index.php')?>">GO TO THE MAIN MENU</a>
    </div>


<h2>Welcome to Admin contacts</h2>
<table class="list">
	<tr>
		<th>ID</th>
		<th>NAME</th>
		<th>EMAIL</th>
		<th>SUBJECT</th>
		<th>MESSAGE</th>
		<th>TIME</th>
		<th>&nbsp;</th>
  	    <th>&nbsp;</th>
        <th>&nbsp;</th>
	</tr>
	<?php while($contact = mysqli_fetch_assoc($contacts)) {?>
		<tr>
			<td><?php echo h($contact['id']); ?></td>
			<td><?php echo h($contact['name']); ?></td>
			<td><?php echo h($contact['email']); ?></td>
			<td><?php echo h($contact['subject']); ?></td>
			<td><?php echo h($contact['message']); ?></td>
			<td><?php echo $contact['time']; ?></td>
			<td><a class="action" href="<?php echo url_for('/admin/contacts/show_contacts.php?id=' . $contact['id']) ;?>">CLICK TO VIEW</a></td>
			<td><a class="action" href="<?php echo url_for('/admin/contacts/delete_contacts.php?id='. h(u($contact['id'])))?>">CLICK TO DELETE</a></td>
		</tr>
	<?php }?>
</table>

<?php
  mysqli_free_result($contacts);
 ?>

</div>
</div>


<?php include(SHARED_PATH . '/admin_footer.php');?>