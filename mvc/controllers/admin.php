<?php
    class admin extends controller{
        var $categorymodel;
        var $accadminmodel;
        var $commonmodel;
        var $productmodel;
        var $slider;
        var $ordermodel;
        var $table = "admin_account";
        var $homemodel;
        function __construct()
        {
            $this->homemodel  = $this->ModelAdmin("homemodel");
            $this->categorymodel = $this->ModelAdmin("categorymodel");
            $this->accadminmodel = $this->ModelAdmin("accountmodel");
            $this->commonmodel = $this->ModelCommon("commonmodel");
            $this->productmodel = $this->ModelAdmin("productmodel");
            $this->slider = $this->ModelAdmin("slidermodel");
            $this->ordermodel=$this->ModelAdmin("ordermodel");
            
            if(isset($_COOKIE["user"])){
                $cookie = $_COOKIE["user"];
                $result = $this->commonmodel->GetCookie($cookie,$this->table);
                if($result < 1){
                    header("location:".base."login/admin");
                }
            }else{
                header("location:".base."login/admin");
            }
            
        }

        function error404(){
            $data = [];
            $this->ViewAdmin("error404",$data);
        }

       
        function home(){
            $countallorder = $this->homemodel->CountAllOrder();
            $totalmony = $this->homemodel->CountAllMony();
            $ordersuccess = $this->homemodel->CountOrderSuccess();
            $totaluser = $this->homemodel->CountUser();
            $ordernew = $this->homemodel->OrderNew();
            $data = [
                "folder"=>"home",
                "file"  =>"homeadmin",
                "totalorder"=>$countallorder[0]["tong"],
                "totalmony"=>$totalmony[0]["tong"],
                "ordersuccess"=>$ordersuccess[0]["tong"],
                "ordernew"=>$ordernew,
                "totaluser"=>$totaluser[0]["tong"]
            ];
            $this->ViewAdmin("masterlayout",$data);
        }

       
        function showcategory(){
            $limit = 5;
            if(isset($_GET['page'])){
                $currentpage =  $_GET['page'];
            }else $currentpage = 1;
            $offset = ($currentpage - 1)*$limit;
            $totalcategory = $this->commonmodel->GetNumber("category");
            $totalpage = ceil($totalcategory / $limit);
            $mess = "";
            $temp = $this->commonmodel->GetCategoryPage($limit,$offset,"category");
            $result = json_decode($temp,true);
            if( isset($_SESSION["DeleteCategory"]) ){
                $mess  = $_SESSION["DeleteCategory"];
                unset($_SESSION["DeleteCategory"]);
            }
            $data = [
            "folder"     =>"category",
            "file"       =>"showcategory",
            "title"      =>"List category",
            "data"       =>$result,
            "mess"       =>$mess,
            "total"  =>$totalpage,
            "currentpage"=>$currentpage
            ];
            $this->ViewAdmin("masterlayout",$data);
        }

        function deletecategory($id,$page,$stt){
            if($stt % 5 == 1){
                $page-=1;
            }
            $result = $this->categorymodel->DeleteCategory($id);
            $this->productmodel->UpdateProduct($id);
            if($result){
                $_SESSION["DeleteCategory"] = "Delete success!";
                header("location:".base."admin/showcategory&page=".$page."");
            }
            
        }

 
        function addcategory(){
            $mess = "";
            if(isset($_POST["submit"])){
                $name = $_POST["name_category"];
                $publish = "Hien Thi";
                $slug = $_POST["slug"];
                $result = $this->categorymodel->AddCategory($name,$publish,$slug);
                if($result == true){
                    $mess = "Add success";
                   
                }else{
                    $mess ="Fail try again";
                }
            }
            $data = [
                "folder"=>"category",
                "file"  =>"addcategory",
                "title" =>"New category",
                "mess"  =>$mess];
            $this->ViewAdmin("masterlayout",$data);
        }


        function statuscategory(){
            $id = $_GET['id'];
            $status = $_GET['status'];
            if(isset($_GET["page"])){
                $page = $_GET["page"];
            }else $page =1;
            $this->categorymodel->StatusCategory($id,$status);
            header("location:".base."admin/showcategory&page=".$page."");
        }

        function editcategory(){
            $id = $_GET['id'];
            if(isset($_GET["page"])){
                $page = $_GET["page"];
            }else{
                $page = 1;
            }
            $mess="";
            if(isset($_POST['submit'])){
                $slug = $_POST['slug'];
                $name = $_POST['name'];
                $result = $this->categorymodel->EditCategory($name,$slug,$id);
                if($result != null){
                    $mess = "Edit success!";
                }else{
                    $mess = "Fail!";
                }
            }
            $result = $this->commonmodel->GetData($id,"category");
            $data = [
                "folder"      =>"category",
                "file"        =>"edit category",
                "title"       =>"editcategory",
                "data"        =>$result,
                "mess"        =>$mess,
                "page"        =>$page
            ];
            $this->ViewAdmin("masterlayout",$data);
        }

       

        function addproduct(){
            $data_category = json_decode($this->categorymodel->GetCategory(),true);
            $notifi = [];
            $addsuccess="";
            if(isset($_POST["submit"])){
                $product = $_POST["product"];

                if($product["id_category"] == "true"){
                    $notifi["category"] = "Please Choose Category";
                }
                if($product["name"] == ""){
                    $notifi["name"] = "Please Input Name Product";
                }
                if($product["price"] == ""){
                    $notifi["price"] = "Please Input Price";
                }
                if($_FILES["img"]["name"] == ""){
                    $notifi ["img"] = "Please Input Picture";
                }
                if($product["quantity"] == ""){
                    $notifi["quantity"] = "Please Input Amount";
                }
                if($product["sale"] == ""){
                    $notifi["sale"] = "Please Input Sale";
                }
                if($notifi == null){
                    $img_product = $_FILES["img"]["name"];
                    $checkUpLoad = UpLoadFiles(urlFileProduct,$_FILES);
                    if($checkUpLoad != 1){
                        $notifi["img"] = $checkUpLoad["exits"];
                    }
                }

                $temp = $this->categorymodel->GetCategoryId($product["id_category"]);
                $name_category = json_decode($temp,true);
                if($notifi == null){
                    $result = $this->productmodel->AddProduct($product["name"],$product["price"],$img_product,$product["quantity"],$product["decs"],$product["company"],$product["id_category"],$name_category[0]["name"],$product["sale"]);
                    if($result == true){
                        $addsuccess = "Add success!";
                    }
                };
            }
            $data = [
            "folder" =>"product",
            "file"=>"addproduct",
            "title"=>"Add newproduct",
            "data"=>$data_category,
            "notifi"=>$notifi,
            "addsuccess"=>$addsuccess
            ];
            $this-> ViewAdmin("masterlayout",$data);
        }

        function showproduct(){

            if( isset($_SESSION["DeleteProduct"]) ){
                $mess  = $_SESSION["DeleteProduct"];
                unset($_SESSION["DeleteProduct"]);
            }else{
                $mess = "";
            }

            if(isset($_GET['page'])){
                $currentpage =  $_GET['page'];
            }else $currentpage = 1;

            $limit = 3;
            $totalproduct = $this->commonmodel->GetNumber("product");
            $totalpage = ceil($totalproduct / $limit);
            $offset = ($currentpage - 1) * $limit;
            $result = json_decode($this->commonmodel->GetCategoryPage($limit,$offset,"product"),true);
            $totalpage = ceil($totalproduct / $limit);
            $data = [
                "folder"      =>"product",
                "file"        =>"showproduct",
                "title"       =>"List product",
                "data"        =>$result,
                "total"       =>$totalpage,
                "currentpage" =>$currentpage,
                "mess"        =>$mess
            ];
            $this->ViewAdmin("masterlayout",$data);
        }


        function deleteproduct($id,$page,$stt){
            $result = $this->productmodel->DeleteProduct($id);
            if($stt % 3 == 1){
                $page-=1;
            }
            if($result){
                $_SESSION["DeleteProduct"] = "Delete success!";
                header("location:".base."admin/showproduct&page=".$page."");
            }
        }

        function editproduct(){

            if(isset( $_GET["page"])){
                $page = $_GET["page"];
            }else $page =1;
            $id = $_GET['id'];
            $product = $this->commonmodel->GetProductById($id);
            $category = json_decode($this->categorymodel->GetCategory(),true);
            $notifi = [];
            if(isset($_POST["submit"])){
                $editproduct = $_POST["product"];
                if($_FILES["img"]["name"] == ""){
                    $notifi ["img"] = "Please Input Product";
                }else{
                    $img_product = $_FILES["img"]["name"];
                    $checkUpLoad = UpLoadFiles(urlFileProduct,$_FILES);
                    if($checkUpLoad != 1){
                        $notifi["img"] = $checkUpLoad["exits"];
                    }
                }
                if($notifi == null){
                    $temp = $this->categorymodel->GetCategoryId($editproduct["id_category"]);
                    $name_category = json_decode($temp,true);
                    $result = $this->productmodel->UpdateProductById($id,$editproduct["name"],$editproduct["price"],$img_product,$editproduct["quantity"],$editproduct["decs"],$editproduct["company"],$editproduct["id_category"],$name_category[0]["name"]);
                    if($result != null){
                        notification("success","Edit success","","","false","");
                        header('Refresh: 1; URL='.base.'admin/showproduct');
                    }
                }
            }

            $data = [
                "folder"=>"product",
                "file"  =>"editproduct",
                "title" =>"Edit product",
                "product"=>$product,
                "category"=>$category,
                "notifi"=>$notifi,
                "page"  =>$page
            ];
            $this->ViewAdmin("masterlayout",$data);
        }
      


        function useraccount(){
            if(!isset($_GET['page']) || $_GET['page'] < 1){
                $currentpage = 1;
            }else $currentpage =  $_GET['page'];
            $limit = 6;
            $offset = ($currentpage-1)*$limit;
            $listaccount = $this->accadminmodel->GetAllUser($limit,$offset);
            $numberaccount = $this->accadminmodel->GetNumberUser();
            $totalpage = ceil($numberaccount/$limit);
            $data = [
                "folder"=>"useraccount",
                "file"  =>"useraccount",
                "title" =>"Manage account",
                "listaccount"=>$listaccount,
                "currentpage"=>$currentpage,
                "totalpage"=>$totalpage
            ];
            $this->ViewAdmin("masterlayout",$data);
        }
        

        function statusaccountuser(){
            if(isset($_GET["page"])){
                $page = $_GET["page"];
            }else $page = 1;
            $id = $_GET['id'];
            $status = $_GET['status'];
            $this->accadminmodel->StatusAccountUser($id,$status);
            header("location:".base."admin/useraccount&page=".$page."");
        }


        function order(){
            if(!isset($_GET['page']) || $_GET['page'] < 1){
                $currentpage = 1;
            }else $currentpage =  $_GET['page'];
            $numberorder = $this->ordermodel->GetNumberOrder();
            $limit =  6;
            $totalpage = ceil($numberorder / 6);
            $offset = ($currentpage - 1) * 6;
            $listorder = $this->ordermodel->GetAllOrder($limit,$offset);
            $data = [
                "folder"=>"order",
                "file"  =>"order",
                "title" =>"Manage order",
                "listorder"=>$listorder,
                "currentpage"=>$currentpage,
                "totalpage"=>$totalpage
            ];
            $this->ViewAdmin("masterlayout",$data);
        }

        function orderdetails(){
            $mess ="";
            $id_user = $_GET["id_user"];
            $id_order = $_GET["id_order"];
            if(isset($_GET["page"])){
                $page = $_GET["page"];
            }else{
                $page = 1;
            }
            $status = $this->ordermodel->GetStatusOrder($id_order);
            $order_details = $this->ordermodel->GetOrderDetails($id_order);
            $info_user = $this->ordermodel->GetInfoUserById($id_user); 
            if(isset($_POST["submit"])){
                $this->ordermodel->orderprocessing($id_order);
                notification("success","Order success","Order processing","","false","#3085d6");
                header('Refresh: 1; URL='.base.'admin/orderdetails&id_order='.$id_order.'&id_user='.$id_user.'&page='.$page.'');
            }
            $data = [
                "folder"=>"order",
                "file"  =>"orderdetails",
                "title" =>"manageodetails",
                "mess"  =>$mess,
                "infouser"=>$info_user,
                "orderdetails"=>$order_details,
                "idorder" => $id_order,
                "page"=>$page,
                "statusorder"=>$status[0]["status"]
            ];
            $this->ViewAdmin("masterlayout",$data);
        }
    }
?>
