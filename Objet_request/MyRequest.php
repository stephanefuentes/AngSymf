<?php

class MyRequest
{


    public function get($paramName, $default = null)
    {

        if (!empty($_GET[$paramName])) {
            return $_GET[$paramName];
        }

        return $default;


    }



    public function getInt($paramName, $default = null)
    {

        if (!empty($_GET[$paramName]) && ctype_digit($_GET[$paramName])) {


            return (int)$_GET[$paramName];
        }

        return $default;
    }
}