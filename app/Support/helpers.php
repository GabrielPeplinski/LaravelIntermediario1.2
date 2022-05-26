<?php

if(!function_exists('doesMatchRegex')){
    function doesMatchRegex($regex, $value):bool
    {
        if(!preg_match($regex, $value)){
            return false;
        }

        return true;
    }
};

if(!function_exists('isString')){
    function isString($value):bool
    {
        if(!is_string($value)) {
            return false;
        }

        return true;
    }
};


