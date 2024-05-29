<?php

namespace app\kahuna\api;

require 'vendor/autoload.php';

use \AltoRouter;
use app\kahuna\api\helper\ApiHelper;

/** Basic Settings----------------------*/
header("Content-Type: application/json; charser=UTF-8");
ApiHelper::handleCors();
/**----------------------*/

$router = new AltoRouter();


/**Agent Routes----------------------*/
$router->map('POST', '/agent/register', 'AgentController#register', 'agent_register');
$router->map('GET', '/agent/info', 'AgentController#getInfo', 'get_info');
/**----------------------*/


/**Agent Authentication Routes----------------------*/
$router->map('POST', '/agent/login', 'AuthAgentController#login', 'auth_login');
$router->map('POST', '/agent/logout', 'AuthAgentController#logout', 'auth_logout');
$router->map('GET', '/agent/token', 'AuthAgentController#verifyToken', 'auth_token');
/**----------------------*/

/**Agent Product Routes----------------------*/
$router->map('GET', '/products', 'ProductController#getProducts', 'get_products');
$router->map('GET', '/product/[i:id]', 'ProductController#get', 'get_product');
$router->map('POST', '/product', 'ProductController#createProduct', 'create_product');
/**----------------------*/

/**Ticket Routes----------------------*/
$router->map('GET', '/tickets', 'TicketController#getTickets', 'get_tickets');
$router->map('GET', '/ticket/[i:id]', 'TicketController#getTicket', 'get_ticket');
$router->map('POST', '/ticket', 'TicketController#replyTicket', 'reply_ticket');
/**--------------------- -*/

$match = $router->match();
if(is_array($match)){
    $target = explode('#', $match['target']);
    $class = $target[0];
    $method = $target[1];
    $params = $match['params'];
    $requestData = ApiHelper::getRequestData();
    if(isset($_SERVER['HTTP_X_API_KEY'])){
        $requestData['api_user'] = $_SERVER['HTTP_X_API_USER'];
    }
    if(isset($_SERVER['HTTP_X_API_KEY'])){
        $requestData['api_token'] = $_SERVER['HTTP_X_API_KEY'];
    }
    call_user_func(__NAMESPACE__."\controller\\$class::$method", $params, $requestData);
}else{
    header($_SERVER['SERVER_PROTOCOL']. '404 Not Found');
}
















