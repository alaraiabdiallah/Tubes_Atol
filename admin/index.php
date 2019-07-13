<?php
require_once "../lib/bootstrap.php";
redirectWhenGuest("login.php");
redirectWhenNotAdmin("../index.php");
require_once "views/home.php";
?>
