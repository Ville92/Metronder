<?php
require_once('config/config.php');
session_destroy(); //tuhoa sessio!
redirect("index.php"); //siirry kotisivulle
?>