<?php
    class infomodel extends database{
        function ChangerInfo($id, $name, $email, $address,$phone){
            $sql = "UPDATE user_account SET phone_number = '$phone', email_account = '$email', address_user = '$address', name = '$name' where id = $id";
            $query = $this->conn->prepare($sql);
            $query->execute();
        }

        function GetInfoUser($id){
            $sql = "SELECT * FROM user_account where id = $id";
            $query = $this->conn->prepare($sql);
            $query->execute();
            $result =  $query->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }

        function ChangerPassUser($id, $pass){
            $sql = "UPDATE user_account SET pass_word = '$pass' where id = $id ";
            $query = $this->conn->prepare($sql);
            $query->execute();
        }
    }
?>