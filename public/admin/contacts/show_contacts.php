<?php
require_once('../../../private/initialize.php');
require_login();
$page_title = "show contacts";
include(SHARED_PATH . "/admin_header.php");
$id = $_GET['id'] ?? 'welcome';

$contact = find_one_record($id);
 

  
?>
<div id="content">
 <div class="actions">
      <a class="action" href="<?php echo url_for('/admin/contacts/view_contacts.php')?>">back to list</a>
</div>

<div class="contact show">

    <h1>contact: <?php echo h($contact['name']); ?></h1>

    <div class="attributes">
      <dl>
        <dt>Name</dt>
        <dd><?php echo h($contact['name']); ?></dd>
      </dl>
      <dl>
        <dt>Email</dt>
        <dd><?php echo h($contact['email']); ?></dd>
      </dl>
      <dl>
        <dt>Subject</dt>
        <dd><?php echo h($contact['subject']); ?></dd>
      </dl>
      <dl>
        <dt>Message</dt>
        <dd><?php echo h($contact['message']); ?></dd>
      </dl>
      <dl>
        <dt>Time</dt>
        <dd><?php echo $contact['time'] ; ?></dd>
      </dl>
    </div>

  </div>

</div>


<?php include(SHARED_PATH . "/admin_footer.php");?>