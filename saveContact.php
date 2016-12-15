<?php
require_once("config/config.php");
$_SESSION['personID2'] = $_POST['givenChatter'];
redirect("chat.php");
?>


