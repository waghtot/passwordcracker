<?php

class StringFinder{

    public static function findDigits(int $input){

        $case = 1;
        $string = '';
        $count = 0;
        $found = $input;
        while($count < 100000){
            $string = StringHelper::fillLeftWithZero($count);
            $string = StringHelper::salter($string);
            if(DatabaseHelper::checkUser($string, $case) == true){
                $found ++;
                if($found == CASE_ONE_DONE){
                    return $found;
                }
            }
            $count++;
        }
        return $found;
    }

    public static function findDigitsUppercases(int $input){

        $case = 2;
        $length = 4;
        $string = '';
        $find = DIGITS.UPPERCASES;
        $found = $input;

        $string = StringHelper::generateRandomString($length, $find, CASE_TWO);
        $string = StringHelper::salter($string);

        if(DatabaseHelper::checkUser($string, $case) === true){

            $found ++;
            if($found == CASE_TWO){
                return $found;
            }

        }

    }

    public static function findLowercases(int $input){
        $case = 3;
        $length = 6;
        $string = '';
        $find = LOWERCASES;
        $found = $input;

        $handle = fopen(SOURCE_FILE, "r");
        for ($i = 0; $row = fgetcsv($handle); ++$i) {

            $string = StringHelper::salter($row[0]);

            if(DatabaseHelper::checkUser($string, $case) === true){
    
                $found ++;
                if($found == CASE_THREE){
                    return $found;
                }
    
            }

        }
        fclose($handle);


    }

    public static function findDigitsUppercasesLowercases(int $input){
        
        $case = 4;
        $length = 6;
        $string = '';
        $find = DIGITS.LOWERCASES.UPPERCASES;
        $found = $input;

        $string = StringHelper::generateRandomString($length, $find, CASE_FOUR);
        $string = StringHelper::salter($string);

        if(DatabaseHelper::checkUser($string, $case) === true){

            $found ++;
            if($found == CASE_FOUR){
                return $found;
            }

        };

    }

}