<?php
    $action = getReq('action');
    if(isDelete()){
        try{
            $id = getReq('id');
            if(empty($id))
                throw new Exception("Id required for deleting data");
            DBDelete($db,$id,"product");
            header('location: barang.php');
        } catch (Exception $e){
            $errors['query'] = $e->getMessage();
        }
    }
    $queryProduct = $db->query("SELECT * FROM product");
    $results = fetchToArray($queryProduct);
?>