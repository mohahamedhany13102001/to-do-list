<?php

namespace Session;

class Session{
    public function __construct()
    {
        session_start();
    }
    public function set($key , $value)
    {
        $_SESSION[$key]= $value;
    }
    public function get($key)
    {
       return $_SESSION[$key];
    }
    public function hasGet($key)
    {
       return isset($_SESSION[$key]);
    }
    public function remove($key)
    {
       unset( $_SESSION[$key]);
    }
    public function destroy($key)
    {
        session_destroy($key);
        }
}

?>