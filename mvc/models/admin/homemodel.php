<?php
    class homemodel extends database{
        function CountAllOrder(){
            $sql = "SELECT count(*) as tong FROM order_product WHERE cancel_order =  0";
            $query = $this->conn->prepare($sql);
            $query->execute();
            $result = $query->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }

        function CountAllMony(){
            $sql = "SELECT sum(total_mony) as tong FROM order_product WHERE status_recieve = 'true'";
            $query = $this->conn->prepare($sql);
            $query->execute();
            $result = $query->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }

        function CountOrderSuccess(){
            $sql = "SELECT count(*) as tong FROM order_product WHERE status_recieve = 'true'";
            $query = $this->conn->prepare($sql);
            $query->execute();
            $result = $query->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }

        function OrderNew(){
            $sql = "SELECT * FROM order_product WHERE cancel_order =  0 and delete_order = 0 order by id desc limit 4";
            $query = $this->conn->prepare($sql);
            $query->execute();
            $result = $query->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }

        function CountUser(){
            $sql = "SELECT count(*) as tong FROM user_account";
            $query = $this->conn->prepare($sql);
            $query->execute();
            $result = $query->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }
    }
?>