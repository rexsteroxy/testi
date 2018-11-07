<?php
require_once('../../private/initialize.php');
//unset($_SESSION['admin_id']);
require_login();
$page_title = "admin_homepage";
include_once(SHARED_PATH .'/admin_header.php');

?>

    <div id="content">
    	<div id="main-menu">
    		<h1>Main Menu</h1>
    			<ul>
    				<li><a href=contacts/view_contacts.php >View Contacts</a></li>
    				<li><a href="order/view_orders.php" >View Orders</a></li>
    				<li><a href="staff/view_admin.php" >View  Administrators</a></li>
    			</ul>
    	</div>
    </div>

<?php include_once(SHARED_PATH .'/admin_footer.php');?>