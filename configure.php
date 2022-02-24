<?php
    session_start();
    isset($_SESSION['cart']) ? $_SESSION['cart'] : array();
    $products = array(
                    array("id"=>101,"name"=>"Basket Ball", "image"=>"basketball.png", "price"=>150),
                    array("id"=>102,"name"=>"Football", "image"=>"football.png", "price"=>120),
                    array("id"=>103,"name"=>"Soccer", "image"=>"soccer.png", "price"=>110),
                    array("id"=>104,"name"=>"Table Tennis", "image"=>"table-tennis.png", "price"=>130),
                    array("id"=>105,"name"=>"Tennis", "image"=>"tennis.png", "price"=>100),
                ); 
    

    if(isset($_REQUEST['action'])){
        $action=$_REQUEST['action'];
        $prId=$_REQUEST['prId'];
        $removeId=$_REQUEST['removeId'];
        $updateId=$_REQUEST['updateId'];
        $newQty=$_REQUEST['newQty'];
        switch($action){
            case "add":
                addProductTosession($products,$prId);
                break;
            case "remove":
                if(isset($removeId)){remove($removeId);};
                break;
            case "update":
                if(isset($updateId)){updateCart($updateId,$newQty);};
                break;
                case "total":
                    totalValueincart();
                    break;
            case "clearCart":
                //if(isset($compId)){completed($compId);};
                break;
        }
    }

    //dynamic redering the products
    function display($products){
        foreach($products as $key => $val) {
                echo'<div id="'.$val['id'].'" class="product">
                        <img src="images/'.$val['image'].'">
                        <h3 class="title">'.$val['name'].'</h3>
                        <span>Price: '.$val['price'].'</span>
                        <input type="hidden" name="quantity" value="1">
                        <button class="add-to-cart" id="addToCart" value="'.$val['id'].'">Add To Cart</button>
            </div>';
        }
    }

    //function to add product in the cart
    function addProductTosession($products,$prId){
        $casrtSession=isset($_SESSION['cart']) ? $_SESSION['cart'] : array();
        foreach($products as $value){
            if($prId == $value['id'] && !checkProductInSession($prId)){
                $value['quantity']=1;
                array_push($casrtSession,$value);
                $_SESSION['cart']=$casrtSession;
                break;
            }
        }
        echo json_encode(array('data'=>$_SESSION['cart']));
    }
    
    //function to check if product is already in the cart
    function checkProductInSession($prId){
        $casrtSession=isset($_SESSION['cart']) ? $_SESSION['cart'] : array();
        foreach($casrtSession as $key => $value){
            if($prId==$value['id']){
                return true;
                break;
            }
        }
        return false;
    }


    //function to remove the product from cart
    function remove($removeId){
        foreach($_SESSION['cart'] as $key => $value){
            if($removeId == $value['id']){
                array_splice($_SESSION['cart'],$key,1);
                break;
            }
        }
        echo json_encode(array('data'=>$_SESSION['cart']));
    }


    //update product quantity in the cart

    function updateCart($updateId,$qty){
        $casrtSession=isset($_SESSION['cart']) ? $_SESSION['cart'] : array();
        foreach($casrtSession as $key => $value){
            if($updateId == $value['id']){
                $casrtSession[$key]['quantity']=$qty;
                $_SESSION['cart']=$casrtSession;
                break;
            }
        }
        echo json_encode(array('data'=>$_SESSION['cart']));
    }

    //total value of cart
    function totalValueincart(){
        $total = 0;
        foreach($_SESSION['cart'] as $key=> $value){
            $total += $value['price'] * $value['quantity'];
        }
        //echo json_encode(array('total'=>$total));
        echo $total;
    }

    // //clear cart
    // if($_GET['reset']=='reset'){
    //     session_unset();
    // }
?>