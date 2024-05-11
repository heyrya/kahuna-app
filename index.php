<?php

namespace app\kahuna\api;

require 'vendor/autoload.php';
require 'helper/ApiHelper.php';
use \AltoRouter;
use app\kahuna\api\helper\ApiHelper;

/** Vasic Settings----------------------*/
$baseURI = '/kahuna-laptop';
header("Content-Type: application/json; charser=UTF-8");
ApiHelper::handleCors();
/**----------------------*/

$router = new AltoRouter();
$router->setBasePath('/kahuna-laptop');

/**Agent Routes----------------------*/
$router->map('GET', '/agent', 'AgentController#getInfo', 'get_info');
/**----------------------*/


/**Authentication Routes----------------------*/
$router->map('POST', '/login', 'AuthController#login', 'auth_login');
$router->map('POST', '/logout', 'AuthController#logout', 'auth_logout');
$router->map('token', '/token', 'AuthController#verifyToken', 'auth_token');
/**----------------------*/

/**Product Routes----------------------*/
$router->map('GET', '/products', 'ProductController#getAll', 'get_products');
$router->map('GET', '/product/[i:id]', 'ProductController#get', 'get_product');
$router->map('POST'. 'product', 'ProductController#newProduct', 'new_product');
/**----------------------*/

/**Ticket Routes----------------------*/
$router->map('GET', '/tickets', 'TicketController#getAll', 'get_tickets');
$router->map('GET', '/ticket/[i:id]', 'TicketController#get', 'get_ticket');
$router->map('POST', '/ticket', 'TicketController#newTicket', 'new_ticket');
/**----------------------*/

echo __NAMESPACE__;
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
    call_user_func(__NAMESPACE__."\controller\\$class::$action", array($params, $requestData));
}else{
    header($_SERVER['SERVER_PROTOCOL']. '404 Not Found');
}
















