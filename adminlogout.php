<?php
session_start();

// Destroy all session data
$_SESSION = [];
session_unset();
session_destroy();

// Redirect to signin page
header("Location:signinadmin.php");
exit();
?>
