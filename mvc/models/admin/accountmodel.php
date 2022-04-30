<?php
    class accountmodel extends database{
        function LoginUser($email,$pass){
            $sql = "SELECT * FROM user_account WHERE email_account = '$email' and pass_word  = '$pass'";
            $query = $this->conn->prepare($sql);
            $query->execute();
            $result =  $query->rowCount();
            return $result;
        }
        
        function CheckBlockUser($email){
            $sql = "SELECT * FROM user_account WHERE email_account = '$email' and active_status = 'block'";
            $query = $this->conn->prepare($sql);
            $query->execute();
            $result =  $query->rowCount();
            return $result;
        }

        function GetNameUser($email,$pass){
            $sql = "SELECT * FROM user_account WHERE email_account = '$email' and pass_word  = '$pass'";
            $query = $this->conn->prepare($sql);
            $query->execute();
            $result =  json_encode($query->fetchAll(PDO::FETCH_ASSOC));
            return json_decode($result,true);
        }

        function GetAllUser($limit,$offset){
            $sql = "SELECT * FROM user_account ORDER BY 'id' ASC LIMIT $limit OFFSET $offset";
            $query = $this->conn->prepare($sql);
            $query->execute();
            $result =  $query->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }

        function GetNumberUser(){
            $sql = "SELECT * FROM user_account";
            $query = $this->conn->prepare($sql);
            $query->execute();
            $result =  $query->rowCount();
            return $result;
        }

        function StatusAccountUser($id,$status){
            if($status == "Activate"){
                $sql = "UPDATE user_account SET active_status='Block' WHERE id = $id";
                $query = $this->conn->prepare($sql);
                $query->execute();
            }else{
                $sql = "UPDATE user_account SET active_status='Activate' WHERE id = $id";
                $query = $this->conn->prepare($sql);
                $query->execute();
            }
        }
    }
?>