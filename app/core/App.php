<?php
class App{
    protected $controller = 'Customer';
    protected $action = 'index';
    protected $params = [];

    public function __construct()
    {
        $url = $this->urlProcess();
        
        if(isset($url[0])){
            
            $controllerName = ucfirst(strtolower($url[0]));
            if(file_exists(APPROOT . '/controllers/'.$controllerName.'.php')){
                $this->controller = $controllerName;
            }            
            unset($url[0]);
        }

        require_once APPROOT . '/controllers/'.$this->controller.'.php';
        $this->controller = new $this->controller;

        if(isset($url[1])){
            if(method_exists($this->controller, $url[1])){
                $this->action = $url[1];
            }
            unset($url[1]);
        }

        $this->params = $url ? array_values($url) : [];

        call_user_func_array([$this->controller,$this->action], $this->params);

    }

    public function urlProcess(){
        if(isset($_GET['url'])){            
            $url = rtrim($_GET['url'],'/');
            $filter = filter_var($url);
            return explode('/',$filter);
        }
    }
}
?>