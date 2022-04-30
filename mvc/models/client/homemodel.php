<?php
    class homemodel extends database{
        function ShowCategory(){
            $sql = "SELECT * FROM category WHERE status = 'Hiển Thị' and status_delete = 0";
            $query = $this->conn->prepare($sql);
            $query->execute();
            $result =  $query->fetchAll(PDO::FETCH_ASSOC);
            return json_encode($result);
        }

        function SearchProduct($content,$limit,$offset){
            $sql = "SELECT * FROM product WHERE status_delete = 0 and name LIKE '%$content%' order by id limit $limit offset $offset";
            $query = $this->conn->prepare($sql);
            $query->execute();
            $result =  $query->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }

        function GetNumberProductSearch($content){
            $sql = "SELECT * FROM product WHERE status_delete = 0 and name LIKE '%$content%'";
            $query = $this->conn->prepare($sql);
            $query->execute();
            $result =  $query->rowCount();
            return $result;
        }

        function CommentProduct($id_product, $id_user,$name_user, $content){
            $sql = "INSERT INTO comment_product value('',$id_product,$id_user,'$name_user','$content')";
            $query = $this->conn->prepare($sql);
            $query->execute();
        }

        function ShowComment($id){
            $sql = "SELECT * FROM comment_product WHERE id_product = $id";
            $query = $this->conn->prepare($sql);
            $query->execute();
            $result =  $query->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }
    }
?>