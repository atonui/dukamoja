<?php
//start session
session_start();
//destroy session
session_destroy();
//redirect location
header("location:index.php");
?>