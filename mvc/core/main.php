<?php
    class main{
        protected $controller ="error404";
        protected $acction = "error404";
        protected $param = [];

        public function __construct()
        {
            $arr = $this->UrlProcess();
            if($arr != null){
                if(isset($arr[0]) ){
                    if(file_exists("./mvc/controllers/".$arr[0].".php")){
                        $this->controller = $arr[0];
                    }
                    unset($arr[0]);
                }
                require_once "./mvc/controllers/".$this->controller.".php";
                $this->controller = new $this->controller;
                if(isset($arr[1]) ){
                    if(method_exists($this->controller,$arr[1])){
                        $this->acction = $arr[1];
                    }
                    unset($arr[1]);
                }
            }else{
                $this->controller = "home";
                require_once "./mvc/controllers/".$this->controller.".php";
                $this->controller = new $this->controller;
                $this->acction = "index";
            }

            $this->param = $arr?array_values($arr):[];
            call_user_func_array([$this->controller,$this->acction],$this->param);
        }

        function UrlProcess(){
        if(isset($_GET['url']) ){
            return explode("/",filter_var(trim($_GET['url'],"/")));
        } 
    }
    }
?>