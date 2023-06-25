<?php

class StringHelper{

    public static function generateRandomString(int $length, string $input, string $pattern) {
        $string = substr(str_shuffle(str_repeat($input, ceil($length/strlen($input)) )),1,$length);
        $check = self::validateString($string, $pattern);
        if(empty($check)){
            $string = '';
            $string = self::generateRandomString($length, $input, $pattern);
            $check = preg_match(CASE_FOUR, $string, $match);
            if(!empty($match)){
            $string = end($match);
            }
        }
        return $string;
    }

    public static function fillLeftWithZero(string $input){
        if(strlen($input)<5){
            $string=str_pad($input, 5, "0", STR_PAD_LEFT);
            return $string;
        }
        return $input;
    }

    public static function validateString(string $string, string $pattern)
    {
        
        return preg_match($pattern, $string);

    }

    public static function salter(string $string){
        
        return md5($string . SALT);

    }

}