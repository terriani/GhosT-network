<?php

namespace Core;

class Core
{
    /**
     * Inicia a aplicação
     *
     * @return void
     */
    public function run()
    {
        
        $url= '/';
        $parans = [];
        
        if(isset($_GET['url'])){
            $url .= $_GET['url'];
        }

        $url = $this->checkRoute($url);

        if(!empty($url) and $url != '/'){
            $url = explode('/', $url);
            array_shift($url);
            $currentController = $url[0]."Controller";
            array_shift($url);

            if(isset($url) and !empty($url)){
                $currentAction = $url[0];
                array_shift($url);
            }else{
                $currentAction = 'index';
            }

            if(count($url) > 0){
                $parans = $url;
            }
        }else{
            $currentController = HOME."Controller";
            $currentAction = "index";
        }

        $currentController = ucfirst($currentController);

        $prefix = '\Controllers\\';

        if(empty($currentAction)){
            $currentAction = 'index';
        }
        
        if (file_exists('Controllers/'.$currentController.'.php') or 
        !method_exists($prefix.$currentController, $currentAction)) {
            $currentController = 'NotfoundController';
            $currentAction = 'index';
        }

        $newController = $prefix.$currentController;
    
        $controller = new $newController();
        call_user_func_array([$controller, $currentAction], $parans);
    }

    public function checkRoute($url)
    {
        global $route;
        foreach($route as $pt => $newUrl) {
            $pattern = preg_replace('(\{[a-z0-9]{1,}\})', '([a-z0-9]{1,})', $pt);
             if(preg_match('#^('.$pattern.')*$#i', $url, $matches) === 1){
                array_shift($matches);
                array_shift($matches);
                $itens = [];
                if(preg_match_all('(\{[a-z0-9]{1,}\})', $pt, $m)){
                    $itens = preg_replace('(\{|\})', '', $m[0]);
                }
                $arg = [];
                foreach($matches as $key => $match){
                    $arg[$itens[$key]] = $match;
                }
                foreach($arg as $argKey => $argValue){
                    $newUrl = str_replace(':'.$argKey, $argValue, $newUrl);
                }
                $url = $newUrl;
                return $url;
            }
        }
        return "/NotfoundController";
    }
}
