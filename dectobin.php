<?php
    header("Content-Type:application/json");
    if(!empty($_GET['dec'])){
        $dec = $_GET['dec'];
        $result = dectobin($dec);
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

    function dectobin($dec){
        $binStr = '';
        while ($dec>=1){
            $bin = $dec % 2;
            $dec = round($dec/2, 0, PHP_ROUND_HALF_DOWN);
            $binStr .= $bin;
        }
        $binStr = strrev($binStr);
        return $binStr;
    }
?>


