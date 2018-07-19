<?php

namespace Wh2Work\LaravelApi\Responses;

use Symfony\Component\HttpFoundation\Response as FoundationResponse;
use Response;

trait ApiResponseTraits
{
    protected $statusCode = FoundationResponse::HTTP_OK;

    public function getStatusCode()
    {
        return $this->statusCode;
    }

    public function setStatusCode(int $statusCode)
    {
        $this->statusCode = $statusCode;
        return $this;
    }

    public function success($data, int $code=null, string $message='成功')
    {
        if($code){
            $this->setStatusCode($code);
        }
        return [
            'status' => 'success',
            'statusCode' => $this->statusCode,
            'message' => $message,
            'data' => $data
        ];
    }

    public function failed(string $message="失败", int $code=null)
    {
        if($code){
            $this->setStatusCode($code);
        }
        return [
            'status' => 'error',
            'statusCode' => $this->statusCode,
            'errors' => $message 
        ];
    }

}
