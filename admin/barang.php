<?php
require_once "../lib/bootstrap.php";
redirectWhenGuest("login.php");
redirectWhenNotAdmin("../index.php");
$action = isset($_GET['action'])?$_GET['action']: null;
if(in_array($action,['add','edit'])){
    require_once "src/form_barang.php";
    require_once "views/form_barang.php";
}else{
    require_once "src/list_barang.php";
    require_once "views/list_barang.php";
}
?>
