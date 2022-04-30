<?php
    class commonmodel extends database{

        function Login($user,$pass,$table){
            $sql = "SELECT * FROM $table WHERE user_name = '$user' and pass_word  = '$pass'";
            $query = $this->conn->prepare($sql);
            $query->execute();
            $result =  $query->rowCount();
            return $result;
        }
        function AddCookie($user,$cookie,$table){
            $sql = "UPDATE $table SET cookie = '$cookie' WHERE user_name = '$user'";
            $query = $this->conn->prepare($sql);
            $query->execute();
        }

        function ChangePassword($passnew,$cookie,$table){
            $sql = "UPDATE $table SET pass_word = '$passnew' WHERE cookie = '$cookie'";
            $query = $this->conn->prepare($sql);
            $query->execute();
            return $query;
        }

        function GetPassOld($cookie,$table){
            $sql = "SELECT pass_word FROM $table WHERE cookie = '$cookie'";
            $query = $this->conn->prepare($sql);
            $query->execute();
            $result =  $query->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }

        function GetCookie($cookie,$table){
            $sql = "SELECT cookie FROM $table WHERE cookie = '$cookie'";
            $query = $this->conn->prepare($sql);
            $query->execute();
            $result =  $query->rowCount();
            return $result;
        }

        function GetNumber($table){
            $sql = "SELECT * FROM $table WHERE status_delete = 0";
            $query = $this->conn->prepare($sql);
            $query->execute();
            $result =  $query->rowCount();
            return $result;
        }
        function GetCategoryPage($limit,$offset,$table){
            $sql = "SELECT * FROM $table WHERE status_delete = 0  ORDER BY 'id' ASC LIMIT $limit OFFSET $offset";
            $query = $this->conn->prepare($sql);
            $query->execute();
            $result = $query->fetchAll(PDO::FETCH_ASSOC);
            return json_encode($result);
        }
        function GetData($id,$table){
            $sql = "SELECT * FROM $table WHERE id = $id";
            $query = $this->conn->prepare($sql);
            $query->execute();
            $result = $query->fetchAll(PDO::FETCH_ASSOC);
            return json_decode(json_encode($result),true);
        }

        function checkemail($email){
            $sql ="SELECT * FROM user_account WHERE email_account = '$email'";
            $query = $this->conn->prepare($sql);
            $query->execute();
            $result = $query->rowCount();
            return $result;
        }

        function sigin($email,$pass,$name,$address,$phonenumber){
            $sql ="INSERT INTO user_account VALUES ('','$name','$email','$pass','$phonenumber','$address',current_time(),'','Hoạt Động')";
            $query = $this->conn->prepare($sql);
            $result = $query->execute();
            return $result;
        }
        function GetProductNew(){
                $sql = "SELECT * FROM product WHERE status_delete = 0  ORDER BY id DESC LIMIT 4";
                $query = $this->conn->prepare($sql);
                $query->execute();
                $result =  $query->fetchAll(PDO::FETCH_ASSOC);
                return $result;
        }

        function GetProductById($id){
            $sql = "SELECT * FROM product WHERE id = $id";
            $query = $this->conn->prepare($sql);
            $query->execute();
            $result =  $query->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }

        function NumberProductById($id){
                $sql = "SELECT * FROM product WHERE category_id = $id and status_delete = 0";
                $query = $this->conn->prepare($sql);
                $query->execute();
                $result =  $query->rowCount();
                return $result;
        }

        function MSProduct(){
            $sql = "SELECT * FROM product WHERE status_delete = 0  ORDER BY pay DESC LIMIT 3";
            $query = $this->conn->prepare($sql);
            $query->execute();
            $result =  $query->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }

        function ProductSale(){
            $sql = "SELECT * FROM product WHERE status_delete = 0  ORDER BY sale_product DESC LIMIT 3";
            $query = $this->conn->prepare($sql);
            $query->execute();
            $result =  $query->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }

    }
?>