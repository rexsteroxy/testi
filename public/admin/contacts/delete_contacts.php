<?php

require_once('../../../private/initialize.php');
require_login();
if(!isset($_GET['id'])) {
  redirect_to(url_for('/admin/index.php'));
}
$id = $_GET['id'];

if(is_post_request()) {

  $result = delete_contact($id);
  redirect_to(url_for('/admin/contacts/view_contacts.php'));

} else {
  $contact = find_one_record($id);
}

?>

<?php $page_title = 'Delete contact'; ?>
<?php include(SHARED_PATH . '/admin_header.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/admin/contacts/view_contacts.php'); ?>">&laquo; Back to List</a>

  <div class="contact delete">
    <h1>Delete contact</h1>
    <p>Are you sure you want to delete this contact?</p>
    <p class="item"><?php echo h($contact['name']); ?></p>

    <form action="<?php echo url_for('/admin/contacts/delete_contacts.php?id=' . h(u($contact['id']))); ?>" method="post">
      <div id="operations">
        <input type="submit" name="commit" value="Delete contact" />
      </div>
    </form>
  </div>

</div>

<?php include(SHARED_PATH . '/admin_footer.php'); ?>
