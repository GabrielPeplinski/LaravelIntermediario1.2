<?php

if(!function_exists('doesMatchRegex')){
    function execute($regex, $value):bool
    {
        if(!preg_match($regex, $value)){
            return false;
        }

        return true;
    }
};

if(!function_exists('doesMatchRegex')){
    function execute($value):bool
    {
        if(!is_string($value)) {
            return false;
        }

        return true;
    }
};


