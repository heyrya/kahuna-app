<?php
namespace app\kahuna\api\controller;
use app\kahuna\api\model\AccessToken;

class Controller
{
    public static function sendResponse(mixed $data = null, int $code = 200, mixed $error = null)
    {
        if(!is_null($data)){
            $response['data'] = $data;
        }
        if(!is_null($error)){
            $response['error'] = [
                'message'=>$error,
                'code'=>$code
            ];
        }
        http_response_code($code);
        echo json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    }

    public static function checkToken(array $requestData)
    {
        if(!isset($requestData['api_user']) || !isset($requestData['api_token'])){
            return false;
        }
        $token = new AccessToken(agentId: $requestData['api_user'], token: $requestData['api_token']);
        return AccessToken::verify($token);
    }

}