<?php
require_once "../lib/bootstrap.php";
redirectWhenAuthenticated("index.php");
if(isButtonSubmit()){
    try{
        $email = $db->escape_string(postReq('email'));
        $password = postReq('password');
    
        $query = $db->query("SELECT * FROM users WHERE email = '$email' ");
        $result = $query->fetch_object();
        
        if($query->num_rows != 1)
            throw new Exception("Email salah");

        if(!password_verify($password,$result->password))
            throw new Exception("Password salah");

        setUser($result);

        header("location: index.php");
    }catch(Exception $e){
        $errors['auth'] = $e->getMessage();
    }
}

