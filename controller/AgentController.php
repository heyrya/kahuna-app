<?php
namespace app\kahuna\api\controller;

use app\kahuna\api\controller\Controller;
use app\kahuna\api\model\Agent;

class AgentController extends Controller
{
    public static function register(array $params, array $data)
    {
        $name = $data['name'];
        $surname = $data['surname'];
        $email = $data['email'];
        $password = $data['password'];
        $agent = new Agent(name: $name, surname: $surname, email: $email, password: $password);
        $agent = Agent::register($agent);
        self::sendResponse($agent, 201);
    }
}