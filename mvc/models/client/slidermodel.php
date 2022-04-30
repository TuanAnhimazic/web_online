<?php
    class slidermodel extends database{
        function ShowSlider(){
            $sql = "SELECT * FROM slider WHERE status = 'Show'";
            $query = $this->conn->prepare($sql);
            $query->execute();
            $result =  $query->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }
    }
?>