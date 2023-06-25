<?php
class DoRequest {

    public function index($data)
    {
        if(!empty($data)){
            if(!empty($data->param)){
                $parameters = '(';
                foreach($data->param as $value){
                        if(isset($value->value)){
                            $val = $value->value;
                        }else{
                            $val = $value;  
                        }

                    $parameters .= '\''.$val.'\', ';
                }
                $parameters = substr($parameters, 0, strlen($parameters)-2);
                $parameters .= ')';
            }else{
                $parameters = '()';
            }

            $call = 'CALL '.$data->connection.'.'.$data->procedure.$parameters;
            $data = new Database();
            $data->query($call);
            $response = $data->resultset();
            $res = $this->handleResponse($response);
            return $res;
        }
    }

    public function handleResponse(array $payload){
        if(isset($payload[0]) && !empty($payload[0])){
            if($payload[0]->code == 6000){
                if(isset($payload[0]->UID)){
                }
                return $payload[0];
            }
        }
        return false;
    }

}

?>