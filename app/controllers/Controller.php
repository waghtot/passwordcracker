<?php

class Controller{

    private $case_1;
    private $case_2;
    private $case_3;
    private $case_4;


    public function setCase_1(int $status){
        $this->case_1 = $status;
    }

    public function setCase_2(int $status){
        $this->case_2 = $status;
    }

    public function setCase_3(int $status){
        $this->case_3 = $status;
    }

    public function setCase_4(int $status){
        $this->case_4 = $status;
    }

    public function getCase_1(){
        return $this->case_1;
    }

    public function getCase_2(){
        return $this->case_2;
    }

    public function getCase_3(){
        return $this->case_3;
    }

    public function getCase_4(){
        return $this->case_4;
    }
}
