<?php
    class checkoutmodel extends database{
        function AddOrder($id_user,$name,$phone,$address,$total){
            $sql = "INSERT INTO order_product VALUES ('', $id_user, current_time(), '$name', '$address', '$phone', 'Waiting for progressing',$total,'false',0,0)";
            $query = $this->conn->prepare($sql);
            $query->execute();
            $id_order = $this->conn->lastInsertId();
            return $id_order;
        }

        function AddOrderDetails($id_order,$id_product,$quantity,$unit_price,$name_product){
            $sql = "INSERT INTO order_details VALUES ($id_order,'$name_product', $id_product, $quantity, $unit_price)";
            $query = $this->conn->prepare($sql);
            $query->execute();
        }

        function GetQuantityById($id){
            $sql = "SELECT quantity FROM product WHERE id = $id";
            $query = $this->conn->prepare($sql);
            $query->execute();
            $result = $query->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }

        function UpdateQuantityById($id,$quantity){
            $sql = "UPDATE product SET quantity = $quantity WHERE id = $id";
            $query = $this->conn->prepare($sql);
            $query->execute();
        }

        function GetProductPay($id){
            $sql = "SELECT pay FROM product WHERE id = $id and status_delete = 0";
            $query = $this->conn->prepare($sql);
            $query->execute();
            $result = $query->fetchAll(PDO::FETCH_ASSOC);
            return $result[0]["pay"];
        }
        function PayProduct($id,$quantity){
            $sql = "UPDATE product SET pay = $quantity WHERE id = $id";
            $query = $this->conn->prepare($sql);
            $query->execute();
        }

        function GetHistotyOrder($id){
            $sql = "select * from order_product where user_id = $id and cancel_order = 0 and delete_order = 0";
            $query = $this->conn->prepare($sql);
            $query->execute();
            $result = $query->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }
        function Confirm($id){
            $sql = "UPDATE order_product SET status_recieve = 'true' WHERE id = $id";
            $query = $this->conn->prepare($sql);
            $query->execute();
            $sql = "UPDATE order_product SET status = 'Đã Nhận Hàng' WHERE id = $id";
            $query = $this->conn->prepare($sql);
            $query->execute();
        }

        function DeleteOrder($id){
                $sql = "UPDATE  order_product SET delete_order = 1 WHERE id = $id";
                $query = $this->conn->prepare($sql);
                $query->execute();
        }
        function CancelOrder($id){
            $sql = "UPDATE  order_product SET cancel_order = 1 WHERE id = $id";
            $query = $this->conn->prepare($sql);
            $query->execute();
    }
    }
?>