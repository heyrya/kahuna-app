<?php
namespace app\kahuna\api\controller;

use app\kahuna\api\model\Product;

class ProductController extends Controller
{
    public static function createProduct($params, $data)
    {
        if(self::checkToken($data)){
            $serialId = $data['serialId'];
            $name = $data['name'];
            $warranty = $data['warranty'];
            $product = new Product(serialId: $serialId, name: $name, warranty: $warranty);
            $product = Product::createProduct($product);
            self::sendResponse(data: $product, code: 201);
        }else{
            self::sendResponse(code: 403, error: 'Missing, invalid or expired token.');
        }
    }

    public static function getProducts($params, $data)
    {
        if(self::checkToken($data)){
            $products = Product::getProducts();
            self::sendResponse(data: $products, code: 200);
        }else{
            self::sendResponse(code: 403, error: 'Missing, invalid or expired token.');
        }
    }
}