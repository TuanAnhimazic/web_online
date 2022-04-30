<?php
    class ordermodel extends database{
        function GetAllOrder($limit,$offset){
            $sql = "SELECT * FROM order_product WHERE cancel_order = 0 ORDER BY 'id' ASC LIMIT $limit OFFSET $offset";
            $query = $this->conn->prepare($sql);
            $query->execute();
            $result = $query->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }

        function GetNumberOrder(){
            $sql = "SELECT * FROM order_product WHERE cancel_order = 0";
            $query = $this->conn->prepare($sql);
            $query->execute();
            $result = $query->rowCount();
            return $result;
        }

        function GetInfoUserById($id){
            $sql = "SELECT * FROM user_account WHERE id = $id";
            $query = $this->conn->prepare($sql);
            $query->execute();
            $result = $query->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }

        function GetOrderDetails($id_order){
            $sql = "SELECT * FROM order_details WHERE order_id = $id_order";
            $query = $this->conn->prepare($sql);
            $query->execute();
            $result = $query->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }

        function orderprocessing($id){
            $sql = "UPDATE order_product SET status='Đã Xử Lý' WHERE id = $id";
            $query = $this->conn->prepare($sql);
            $query->execute();
        }
        function GetStatusOrder($id){
            $sql = "SELECT * FROM order_product WHERE id = $id";
            $query = $this->conn->prepare($sql);
            $query->execute();
            $result = $query->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }
    }
?>