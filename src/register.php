<?php 
require_once "lib/bootstrap.php"; 
redirectWhenAuthenticated("index.php");

function newUser($db,$data){
    try{
        $insert = DBInsert($db,$data,'users');
        if(!insert) throw new Exception($db->error);
        header("location: login.php");
    }catch(Exception $e){
        $errors['query'] = $e->getMessage();
    }
}

$formData['name'] = postReq('name');
$formData['email'] = postReq('email');
$formData['password'] = password_hash(postReq('password'), PASSWORD_BCRYPT);
$formData['role'] = "CUSTOMER";

if(isButtonSubmit()){
    try{
        newUser($db,$formData);
    }catch(Exception $e){
        $errors['auth'] = $e->getMessage();
    }
}

?>