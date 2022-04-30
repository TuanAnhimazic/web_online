<?php 
    class infouser extends controller{
        var $infomodel;
        function __construct()
        {
            $this->infomodel = $this->ModelClient("infomodel");
            if(!isset($_SESSION["info"])){
                $_SESSION["error_login"] = "Please log in";
                header("location:".base."login/login");
            }
        }
        function index()
        {
            $id_user = $_SESSION["info"]["id"];
            $info_user = $this->infomodel->GetInfoUser($id_user);
            if(isset($_POST["changer_info"])){
                $info = $_POST["info"];
                $this->infomodel->ChangerInfo($id_user, $info["name"], $info["email"], $info["address"], $info["phone"]);
                notifichanger("Successfully changed information");
                header("Refresh: 1.2; URL=".base."infouser/index");
            }

            if(isset($_POST["changer_pass"])){
                $info = $_POST["info"];
                if(md5($info["pass_old"]) == $info_user[0]["pass_word"] ){
                    if($info["pass_confirm"] == $info["pass_new"]){
                        $this->infomodel->ChangerPassUser($id_user, md5($info["pass_new"]));
                        notification("success","Notification","Change password successfully","","false","");
                        header("Refresh: 1.2; URL=".base."infouser/index");
                    }else echo "confirm password does not match";
                }else echo "old password doesn't match";die;
                
            }
            
            $data = [
                "info"=>$info_user
            ];
            $this->ViewClinet("infouser",$data);
        }
    }
?>