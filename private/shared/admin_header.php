<?php 
if (!isset($page_title)){$page_title="admin_homepage";}
?>

<!doctype html>

<html lang="en">
  <head>
    <title>LussHub- <?php echo h($page_title); ?></title>
    <meta charset="utf-8">
<link rel="stylesheet" media="all" href="<?php echo url_for('/stylesheet/staff.css'); ?>" />
  </head>

  <body>
    <header>
      <h1>LussHub Admin Area</h1>
    </header>

    <navigation>
      <ul>
        <li>USER: <?php echo $_SESSION['name'] ?? '' ;?></li>
        <li><a href="<?php echo url_for('/admin/index.php'); ?>">Menu</a></li>
        <li><a href="<?php echo url_for('/admin/logout.php'); ?>">Logout</a></li>
      </ul>
    </navigation>