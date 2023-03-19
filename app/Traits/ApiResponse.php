<?php

namespace App\Traits;


trait ApiResponse{
    public function authresponse($data,$msg,$status,$token='')
    {
        $response=[
            'data'=>$data,
            'msg'=>$msg,
            'status'=>$status,
            'token'=>$token,
        ];
        return response($response,$status);   
}

public function doctorresponse($data,$msg,$status)
{
     $response=[
            'data'=>$data,
            'msg'=>$msg,
            'status'=>$status,
     ];
     return response($response,$status);   
}
}

?>