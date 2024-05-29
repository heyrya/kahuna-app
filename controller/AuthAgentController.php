<?php
namespace app\kahuna\api\controller;

use app\kahuna\api\model\AccessToken;
use app\kahuna\api\model\Agent;
use app\kahuna\api\controller\Controller;

class AuthAgentController extends Controller
{
    public static function login($params, $data)
    {
        $email = $data['email'];
        $password = $data['password'];
        $agent = new Agent(email: $email, password: $password);
        $agent = Agent::authenticate($agent);
        if($agent){
            $token = new AccessToken(agentId: $agent->getId());
            $token = AccessToken::save($token);
            self::sendResponse(data:['agent'=>$agent->getId(), 'token'=>$token->getToken()]);
        }else{
            self::sendResponse(code: 401, error: 'Login failed');
        }
    }

    public static function logout($params, $data)
    {
        if(self::checkToken($data)){
            $agentId = $data['api_user'];
            $token = new AccessToken(agentId: $agentId);
            $token = AccessToken::delete($token);
            self::sendResponse(data: ['message'=> 'Logged ou successfully']);
        }else{
            self::sendResponse(code: 403, error: "Missing, invalid or expired token");
        }
    }

    public static function verifyToken($params, $data)
    {
        if(self::checkToken($data)){
            self::sendResponse(data: ['valid' => true, 'token' => $data['api_token']]);
        }else{
            self::sendResponse(data: ['valid' => false, 'token' => $data['api_token']]);
        }
    }
}