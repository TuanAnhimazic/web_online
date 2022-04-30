<?php
    class home extends controller{
        var $commonmodel;
        var $categorymodel;
        var $slider;
        var $checkoutmodel;
        function __construct()
        {
            $this->commonmodel = $this->ModelCommon("commonmodel");
            $this->categorymodel = $this->ModelClient("homemodel");
            $this->slider = $this->ModelClient("slidermodel");
            $this->checkoutmodel = $this->ModelClient("checkoutmodel");
        }

        function error404(){
            $data = [];
            $this->ViewAdmin("error404",$data);
        }

        function index(){
            if(isset($_GET['page'])){
                $currentpage =  $_GET['page'];
            }else $currentpage = 1;
            $limit = 6;
            $totalproduct = $this->commonmodel->GetNumber("product");
            $totalpage = ceil($totalproduct / $limit);
            $offset = ($currentpage - 1) * $limit;
            $result = json_decode($this->commonmodel->GetCategoryPage($limit,$offset,"product"),true);
            $totalpage = ceil($totalproduct / $limit);
            $tolalcategory =json_decode($this->categorymodel->ShowCategory(),true);
            $productnew = $this->commonmodel->GetProductNew();
            $MSProduct = $this->commonmodel->MSProduct();
            $slider = $this->slider->ShowSlider();
            $productsale = $this->commonmodel->ProductSale();
            $data = [
                "folder"        =>"home",
                "file"          =>"home",
                "data"          =>$result,
                "total"         =>$totalpage,
                "currentpage"   =>$currentpage,
                "totalcategory" =>$tolalcategory,
                "productnew"    =>$productnew,
                "MSProduct"     =>$MSProduct,
                "sliders"       =>$slider,
                "productsale"   =>$productsale
            ];
            $this->ViewClinet("masterlayout",$data);
        }


        function history(){
            if(isset($_SESSION["info"])){
                if(isset($_POST["confirm"])){
                    $id = $_POST["id"];
                    $this->checkoutmodel->Confirm($id);
                }
                if(isset($_POST["cancel"])){
                    $id = $_POST["id"];
                    $this->checkoutmodel->CancelOrder($id);
                }
                if(isset($_POST["delete"])){
                    $id = $_POST["id"];
                    $this->checkoutmodel->DeleteOrder($id);
                }
                if(isset($_POST["details"])){
                    
                }
                $id = $_SESSION["info"]["id"];
                $order = $this->checkoutmodel->GetHistotyOrder($id);
                $data = [
                    "order"=>$order
                ];
                $this->ViewClinet("history",$data);
            }else{
                $_SESSION["error_login"] = "Please login";
                header("location:".base."login/login");
            }
        }
    }
?>