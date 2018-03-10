<?php

class responsemodel
{
    
    public function response($responseCode, $responseData,$responseMessage)
    {
        $res = (object)array();
        $res->responseCode = $responseCode;
        $res->responseData = $responseData;
        $res->responseMessage = $responseMessage;
        return $res;
    }
}


?>