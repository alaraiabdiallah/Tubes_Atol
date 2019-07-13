<?php
    $title = $action == "add" ? "Tambah Barang" : "Edit Barang";
    
    $formData['id'] = getReq('id');
    $formData['code'] = postReq('code');
    $formData['name'] = postReq('name');
    $formData['price'] = postReq('price');
    $formData['stock'] = postReq('stock');
    $formData['descriptions'] = postReq('descriptions');
    $formData['image'] = '';

    function addAction($db,$data){
        try{
            $insert = DBInsert($db,$data,'product');
            if(!insert) throw new Exception($db->error);
            header("location: barang.php");
        }catch(Exception $e){
            $errors['query'] = $e->getMessage();
        }
    }

    function updateAction($db,$data){
        try{
            $update = DBUpdate($db,$data,'product');
            if(!$update) throw new Exception($db->error);
            header("location: barang.php");
        }catch(Exception $e){
            $errors['query'] = $e->getMessage();
        }
    }

    function imageUpload(){
        try{
            $fileObj = $_FILES["image"];
            $allowedTypes = ['jpg','png','jpeg'];
            $target_dir = "../uploads/";
            $target_file = $target_dir . basename($fileObj["name"]);
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            
            if(isButtonSubmit()) {
                $check = getimagesize($fileObj["tmp_name"]);
                if($check !== false) $uploadOk = 1;
                else throw new Exception("File is not an image.");
            }
            if ($fileObj["size"] > 500000)
                throw new Exception("Sorry, your file is too large.");
            
            if(!in_array($imageFileType,$allowedTypes))
                throw new Exception("Sorry, only ".implode(',',$allowedTypes)." files are allowed.");

            if ($uploadOk == 1)
                if (!move_uploaded_file($fileObj["tmp_name"], $target_file))
                    throw new Exception("Sorry, there was an error uploading your file.");

            return $fileObj["name"];
        }catch(Exception $e){
            echo $e->getMessage();die();
            $errors['image_upload'] = $e->getMessage();
            return false;
        }
        
    }
    
    if(isEdit()){
        $query = $db->query("SELECT * FROM product WHERE id = ".getReq('id').";");
        $row = $query->fetch_object();
        $formData['code'] = empty($formData['code'])? $row->code : $formData['code'];
        $formData['name'] = empty($formData['name'])? $row->name : $formData['name'];
        $formData['price'] = empty($formData['price'])? $row->price : $formData['price'];
        $formData['stock'] = empty($formData['stock'])? $row->stock : $formData['stock'];
        $formData['descriptions'] = empty($formData['descriptions'])? $row->descriptions : $formData['descriptions'];
        $formData['image'] = $row->image;
    }

    if(isButtonSubmit()){

        if(!empty($_FILES["image"]['tmp_name']))
            if($filename = imageUpload()) $formData['image'] = $filename;

        if(isEdit()) updateAction($db,$formData);
        if(isAdd()) addAction($db,$formData);
    }
    
?>