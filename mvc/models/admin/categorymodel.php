<?php

    class categorymodel extends database{
        function GetCategory(){
            $sql = "SELECT * FROM category WHERE status_delete = 0";
            $query = $this->conn->prepare($sql);
            $query->execute();
            $result = $query->fetchAll(PDO::FETCH_ASSOC);
            return json_encode($result);
        }
        function DeleteCategory($id){
            $sql = "UPDATE  category SET status_delete = 1 WHERE id = '$id'";
            $query = $this->conn->prepare($sql);
            $query->execute();
            return $query;
        }
        function AddCategory($name,$status,$slug){
            $sql = "INSERT INTO category VALUES ('','$name','$slug','$status',current_time(),'',0)";
            $query = $this->conn->prepare($sql);
            $result = $query->execute();
            return $result;
        }
        function GetCategoryId($id){
            $sql = "SELECT * FROM category WHERE id = '$id' and status_delete = 0";
            $query = $this->conn->prepare($sql);
            $query->execute();
            $result = $query->fetchAll(PDO::FETCH_ASSOC);
            return json_encode($result);
        }
        function StatusCategory($id,$status){
            if($status == "Hiển Thị"){
                $sql = "UPDATE category SET status='Ẩn' WHERE id = $id";
                $query = $this->conn->prepare($sql);
                $query->execute();
            }else{
                $sql = "UPDATE category SET status='Hiển Thị' WHERE id = $id";
                $query = $this->conn->prepare($sql);
                $query->execute();
            }
        }

        function EditCategory($name,$slug,$id){
            $sql = "UPDATE  category SET slug = '$slug', name = '$name' WHERE id = $id";
            $query = $this->conn->prepare($sql);
            $result = $query->execute();
            return $result;
        }
    }

?>