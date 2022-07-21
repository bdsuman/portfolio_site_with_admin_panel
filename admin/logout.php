<?php 
session_start();
session_destroy();
header("Expires: Wed, 1 Jan 1997 00:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-store, no-cache, must-revalidate,max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
echo '<script type="text/javascript">alert("You have successfully Logout.");window.location=\'login.php\';</script>';
?>

