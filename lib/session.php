<?php

class session
{
    public static function start(){
        if (session_status() != PHP_SESSION_ACTIVE){
            session_start();
        }
    }

    public static function set($key, $val){
        $_SESSION[$key] = $val;
    }

    public static function get($key){
        if (isset($_SESSION[$key])){
            return $_SESSION[$key];
        }else{
            return false;
        }
    }

    public static function destroy(){
        session_destroy();
    }
}