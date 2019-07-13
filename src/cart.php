<?php
    require_once "lib/bootstrap.php";
    redirectWhenGuest("login.php");

    function redirectCart(){
        $redirect = $_GET['from'] ?? "cart.php";
        header("location: $redirect");
    }

    if(isGet()){
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $productQuery = $db->query("SELECT * FROM product WHERE id ='$id';");
            $product = $productQuery->fetch_object();
            if(!isCartItemExists($id)){
                addCartItem(
                    [
                        "id" => $product->id,
                        "name" => $product->name,
                        "price" => $product->price,
                        "qty" => 1,
                    ]
                );
            }else{
                $item = getCart($id);
                updateCartQty($id,($item['qty'] + 1));
            }
            
            $redirect = $_GET['from'] ?? "index.php";
            header("location: $redirect");
        }

        if(isset($_GET['id']) && isDelete()){
            $id = $_GET['id'];
            deleteCartItem($id);
            redirectCart();
        }

        $carts = $_SESSION['carts'];
    }

    if(isPost()){
        if(isset($_GET['id'])){
            $id = $_GET['id'];

            if(isCartItemExists($id)){
                if(postReq('qty') < 1)
                    deleteCartItem($id);
                else
                    updateCartQty($id,postReq('qty'));
            }else{
                $productQuery = $db->query("SELECT * FROM product WHERE id ='$id';");
                $product = $productQuery->fetch_object();
                addCartItem(
                    [
                        "id" => $product->id,
                        "name" => $product->name,
                        "price" => $product->price,
                        "qty" => postReq('qty',0),
                    ]
                );
            }
                

            redirectCart();
        }
    }
?>