<?php 
namespace Request;
class Request {

public function get(string $key){
    return $_GET[$key];
}
public function post(string $key){
    return $_POST[$key];
}
public function hasPost($key){
    return isset($_POST[$key]);
}
public function hasGet($key){
    return isset($_GET[$key]);
}
public function clean($key){
    return trim(htmlspecialchars($_POST[$key]));
}
public function header($file)
    {
        return header("location:$file");
    }

}
?>