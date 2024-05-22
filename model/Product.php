<?php
namespace app\kahuna\api\model;

use app\kahuna\api\model\DBConnect;
use \JsonSerializable;
use \PDO;

class Product implements JsonSerializable
{
    private static $db;
    private int $id;
    private string $serialId;
    private string $name;
    private int $warranty;
    private int $registered;

    public function __construct(?int $id = 0, ?string $serialId = null, ?string $name = null, ?int $warranty = 0, ?int $registered = 0)
    {
        $this->id = $id;
        $this->serialId = $serialId;
        $this->name = $name;
        $this->warranty = $warranty;
        $this->registered = $registered;
        self::$db = DBConnect::getInstance()->getConnection();
    }

    public static function createProduct(Product $product): Product
    {
        $sql = "INSERT INTO productstock (serialId, name, warranty, registered) VALUES (:serialId, :name, :warranty, :registered)";
        var_dump(self::$db);
        $sth = self::$db->prepare($sql);
        $sth->bindValue('serialId', $product->getSerialId());
        $sth->bindValue('name', $product->getName());        
        $sth->bindValue('warranty', $product->getWarranty());        
        $sth->bindValue('registered', $product->getRegistered());  
        $sth->execute();
        
        if($sth->rowCount() > 0){
            $product->setId(self::$db->lastInsertId());
        }
        return $product;
    }

    public static function getProducts()
    {
        $sql = "SELECT serialId, name, warranty FROM productstock";
        var_dump(self::$db);
        $sth = self::$db->query($sql);
        $products = $sth->fetchAll(PDO::FETCH_FUNC, fn(...$fields) => new Product(...$fields));
        return $products;
    }

    public function jsonSerialize()
    {
        return [
            "serialId"=>$this->getSerialId(),
            "name"=>$this->getName(),
            "warranty"=>$this->getWarranty(),
        ];
    }

    

    /**
     * Get the value of id
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Set the value of id
     */
    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of serialId
     */
    public function getSerialId(): string
    {
        return $this->serialId;
    }

    /**
     * Set the value of serialId
     */
    public function setSerialId(string $serialId): self
    {
        $this->serialId = $serialId;

        return $this;
    }

    /**
     * Get the value of name
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Set the value of name
     */
    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of warranty
     */
    public function getWarranty(): int
    {
        return $this->warranty;
    }

    /**
     * Set the value of warranty
     */
    public function setWarranty(int $warranty): self
    {
        $this->warranty = $warranty;

        return $this;
    }

    /**
     * Get the value of customerId
     */
    public function getRegistered(): int
    {
        return $this->registered;
    }

    /**
     * Set the value of customerId
     */
    public function setRegistered(int $register): self
    {
        $this->registered = $register;

        return $this;
    }
}