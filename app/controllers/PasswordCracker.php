<?php

class PasswordCracker extends Controller{

    public function __construct()
    {
        return $this->index();
    }

    public function index(){

        $this->checkCases(); // checking actuall state for case_* properties

        $this->caseDigitOnly(); // generate numbers in loop up to 100000

        $this->caseDigitUppercase(); // generate string with three uppercase and one digit

        $this->caseLowercaseOnly(); // check through csv file with six letters words in it

        $this->caseDigitMixCharacters(); // generate mixed letters and digits string for check
        
    }

    private function checkCases(){

        // checking and updating status for all cases in case of unexpected break

        $this->setCase_1(DatabaseHelper::checkStatus(1));

        $this->setCase_2(DatabaseHelper::checkStatus(2));

        $this->setCase_3(DatabaseHelper::checkStatus(3));

        $this->setCase_4(DatabaseHelper::checkStatus(4));

    }

    public function caseDigitOnly(){



        if($this->getCase_1() != CASE_ONE_DONE){ // check for latest status for task

            try{

                while($this->getCase_1() < CASE_ONE_DONE){ // check for latest status for task

                    $state = StringFinder::findDigits($this->getCase_1());
                    $this->setCase_1($state);

                }

            }catch (Exception $e){

                echo 'exception: ', $e->getMessage(), "\n";

            }
        }

    }

    private function caseDigitUppercase(){

        if($this->getCase_2() != CASE_TWO_DONE){
            try{

                while($this->getCase_2() < CASE_TWO_DONE){

                    $state = StringFinder::findDigitsUppercases($this->getCase_2());
                    $this->setCase_2($state);

                }

            }catch (Exception $e){

                echo 'exception: ', $e->getMessage(), "\n";

            }
        }
    }

    private function caseLowercaseOnly(){

        if($this->getCase_3() != CASE_THREE_DONE){

            try{

                while($this->getCase_3() < CASE_THREE_DONE){

                    $state = StringFinder::findLowercases($this->getCase_3());
                    $this->setCase_3($state);

                }

            }catch (Exception $e){

                echo 'exception: ', $e->getMessage(), "\n";

            }

        }

    }

    private function caseDigitMixCharacters(){

        if($this->getCase_4() != CASE_THREE_DONE){

            try{

                while($this->getCase_4() < CASE_FOUR_DONE){

                    $state = StringFinder::findDigitsUppercasesLowercases($this->getCase_4());
                    $this->setCase_4($state);

                }

            }catch (Exception $e){

                echo 'exception: ', $e->getMessage(), "\n";

            }

        }

    }

}
