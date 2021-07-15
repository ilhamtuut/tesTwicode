<?php
    $string = "aku suka makan nasi";
    $string = "di rumah saya ada kasur rusak";
    $string = "abcde edcbza";
    getname($string);

    function getname($string)
    {
        $text = ispalindrome($string)['value'];
        print($text);    
    }

    function ispalindrome($data){
        $data = str_replace(' ', '', $data);    
        $data2 = [];
        $data3 = [];
        $palindromes = [];
        for($i=0; $i<strlen($data); $i++ )  {
            for($j=3; $j<=(strlen($data)-$i); $j++){
                $word = substr($data, $i, $j);
                $reverse_word = strrev($word);
                if($word == $reverse_word){
                    array_push($data2, $word);                  
                }
            }    
        }
        for($i=0; $i<count($data2); $i++ ){
            array_push($data3, ['count' => strlen($data2[$i]), 'value' => $data2[$i]]);
        }
        return max($data3);
    }
?>
