<?php
    header("Content-Type:application/json");
    if(!empty($_GET['bin'])){
        $bin = $_GET['bin'];
        $result = bintodec($bin);
        response(200,"Result",$result);
    }else{
        response(400,"Invalid Request",NULL);
    }

    function response($status,$status_message,$data)
    {
        header("HTTP/1.1 ".$status);
        $response['status']=$status;
        $response['status_message']=$status_message;
        $response['data']=$data;
        
        $json_response = json_encode($response);
        echo $json_response;
    }

    function bintodec($bin){
        $digits = str_split($bin);
        $reversed = array_reverse($digits);
        $res = 0;
        for($x=0; $x < count($reversed); $x++) {
            if($reversed[$x] == 1) {
                $res += pow(2, $x);
            }
        }
        return $res;
    }
?>

