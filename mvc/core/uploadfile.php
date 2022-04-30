<?php
    function UpLoadFiles($url,$file = []){
        
            $target_file = $url.basename($file["img"]["name"]);
        $error =[];
       
            if($file["img"]["size"] > 5242880){
                $error = ["size"=>"file ".$file["img"]["name"]." Over 5MB"];
            }

        
            $file_type = pathinfo($file["img"]["name"], PATHINFO_EXTENSION);
            $array_file_type = ["jpg","png","jpeg","gif"];
            if(!in_array(strtolower($file_type),$array_file_type)){
                $error = ["file ".$file["img"]["name"]." Wrong format"];
            }
        
        
            if(file_exists($target_file)){
                $error = ["exits"=>"file ".$file["img"]["name"]." Exist on database"];
            }
        if(empty($error)){
                if(move_uploaded_file($file["img"]["tmp_name"],$target_file)){
                    $success = true;
                }
        }else{
            return $error;
        }
        return $success;
    }
?>