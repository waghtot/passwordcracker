<?php

class DatabaseHelper extends PasswordCracker{

    public static function checkUser(string $input, int $case){
        $user = self::getUserId($input);
        if(!empty($user)){
            $status = 1;
            self::insertCheckedPassword($input, $case, $status);
            return true;
        }else{
            $status = 0;
            self::insertCheckedPassword($input, $case, $status);
            return false;
        }
    }

    public static function getUserId(string $input){
        $data = new stdClass();
        $data->connection = DB_NAME;
        $data->procedure = __FUNCTION__;
        $data->param = array('password'=>$input);
        $response = new DoRequest();
        $res = $response->index($data);
        return $res;
    }

    public static function insertCheckedPassword(string $input, int $case, int $status){
        $data = new stdClass();
        $data->connection = DB_NAME;
        $data->procedure = __FUNCTION__;
        $data->param = array(
                            'password'=>$input,
                            'case'=>$case,
                            'status'=>$status
                            );

        $response = new DoRequest();

        return $response->index($data);
    }

    public static function deleteBadRecords(int $input){
        $data = new stdClass();
        $data->connection = DB_NAME;
        $data->procedure = __FUNCTION__;
        $data->param = array('case'=>$input);

        $response = new DoRequest();

        return $response->index($data);
    }

    public static function checkStatus(int $input){
        $data = new stdClass();
        $data->connection = DB_NAME;
        $data->procedure = __FUNCTION__;
        $data->param = array('case'=>$input);
        $response = new DoRequest();
        $res = $response->index($data);
        return $res->done;
    }

}