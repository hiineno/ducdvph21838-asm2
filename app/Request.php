<?php
namespace App;
class Request{
    public function getPath(){
        $path = $_SERVER['REQUEST_URI'] ?? '/';
        $path = str_replace('/WEB3014/asm2/public/','/',$path);        
        $position = strpos($path,'?');
        if($position){
            $path = substr($path, 0, $position);
        }
        return $path;
    }
    public function getMethod(){
        return strtoLower($_SERVER['REQUEST_METHOD']);
    }
    public function getBody()
    {
        $body = [];
        if ($this->getMethod() === 'get') {
            foreach ($_GET as $key => $value) {
                $body[$key] = filter_input(INPUT_GET, $key, FILTER_SANITIZE_SPECIAL_CHARS);
            }
        }
        if ($this->getMethod() === 'post') {
            foreach ($_POST as $key => $value) {
                $body[$key] = filter_input(INPUT_POST, $key, FILTER_SANITIZE_SPECIAL_CHARS);
            }
        }
        return $body;
    }
}
