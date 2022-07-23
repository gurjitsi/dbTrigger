<?php
session_start();
session_destroy();   // destroy session data in storage
header("location:index.php");
?>
