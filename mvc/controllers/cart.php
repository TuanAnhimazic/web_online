<?php
    class cart extends controller{
        var $commonmodel;
        var $checkoutmodel;
        function __construct()
        {
            $this->commonmodel = $this->ModelCommon("commonmodel");
            $this->checkoutmodel = $this->ModelClient("checkoutmodel");;
        }
        
        function error404(){
            $data = [];
            $this->ViewAdmin("error404",$data);
        }


        function showcart(){
            if(isset($_POST['submit'])){
                if(isset($_SESSION["cart"])){
                    $order = $_POST['order'];
                    $id = $_SESSION["info"]["id"];
                    $id_order = $this->checkoutmodel->AddOrder($id,$order["name"],$order["phone"],$order["address"],$order["total"]);
                    foreach($_SESSION["cart"] as $key=>$values){
                        $this->checkoutmodel->AddOrderDetails($id_order,$values["id"],$values["quantity"],$values["total"],$values["name"]);
                        $quantity_product = $this->checkoutmodel->GetQuantityById($values["id"]);
                        $quantity_update = $quantity_product[0]["quantity"] - $values["quantity"];
                        $this->checkoutmodel->UpdateQuantityById($values["id"],$quantity_update);
                        $quantity_pay = $this->checkoutmodel->GetProductPay($values["id"]) + $values["quantity"];
                        $this->checkoutmodel->PayProduct($values["id"],$quantity_pay);
                    };
                    unset($_SESSION["cart"]);
                    NotifiOrder("Order Success","home/history");
                }else 
                    notification("error","Unsuccessful","Please add product to cart","OK","true","3085d6");
            }
        
            if(isset($_POST["updatequantity"])){
                $id = $_POST["idproduct"];
                $quantity = $_POST["quantity"];
                $quantity_product = $this->checkoutmodel->GetQuantityById($id);
                if($quantity <= $quantity_product[0]["quantity"]){
                    $_SESSION['cart'][$id]["quantity"]=$quantity;
                    if($_SESSION['cart'][$id]["quantity"] <= 0){
                        $_SESSION['cart'][$id]["quantity"]=1;
                        $_SESSION['cart'][$id]["total"] = $_SESSION['cart'][$id]["quantity"] * $_SESSION['cart'][$id]["price"];
                    }else{
                        $_SESSION['cart'][$id]["total"] = $_SESSION['cart'][$id]["quantity"] * $_SESSION['cart'][$id]["price"];
                    }
                }else{
                    NotifiErrorQuantity("Sorry, only stock left ".$quantity_product[0]["quantity"]." product");
                }
            }
            $total = 0;
            if(isset($_SESSION["cart"])){
                foreach($_SESSION["cart"] as $key=>$values){
                    $total+=$values["total"];
                }
            }
            $data = [
                "total"=>$total
            ];
            $this->ViewClinet("cart",$data);
        }

        function order(){
            
        }
    }
?>