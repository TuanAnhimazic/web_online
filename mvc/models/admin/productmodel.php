<?php

    class productmodel extends database{
        function AddProduct($name,$price,$img,$quantity,$decsription,$company,$id_category,$name_category,$sale){
            $sql = "insert into product values ('','$name','$price','$img',$quantity,'$decsription','$company',current_time(),'',$id_category,'$name_category',0,$sale,0)";
            $query = $this->conn->prepare($sql);
            $result = $query->execute();
            return $result;
        }
        function DeleteProduct($id){
            $sql = "UPDATE product SET status_delete = 1 WHERE id = '$id'";
            $query = $this->conn->prepare($sql);
            $query->execute();
            return $query;
        }
        function UpdateProduct($id){
            $sql =  "UPDATE  product SET status_delete = 1 where category_id = $id";
            $query = $this->conn->prepare($sql);
            $query->execute();
            return $query;
        }
        function GetProductPage($id,$limit,$offset){
            $sql = "SELECT * FROM product where category_id = $id and status_delete = 0 ORDER BY 'id' ASC LIMIT $limit OFFSET $offset";
            $query = $this->conn->prepare($sql);
            $query->execute();
            $result = $query->fetchAll(PDO::FETCH_ASSOC);
            return json_decode(json_encode($result),true);
        }
        function GetNumber($id){
            $sql = "SELECT * FROM product where category_id = $id and status_delete = 0";
            $query = $this->conn->prepare($sql);
            $query->execute();
            $result =  $query->rowCount();
            return $result;
        }
        function UpdateProductById($id,$name,$price,$img,$quantity,$decsrip,$company,$id_category,$name_category){
            $sql = "UPDATE product SET price = $price, img_product = '$img', quantity = $quantity, production_company = '$company', descrip = '$decsrip', update_at = current_time(), category_id = $id_category, name_category = '$name_category', name = '$name' WHERE id = $id";
            $query = $this->conn->prepare($sql);
            $result = $query->execute();
            return $result;
        }
    }
?>