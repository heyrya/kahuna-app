<?php
namespace app\kahuna\api\model;

use app\kahuna\api\model\DBConnect;

class Product
{
    private static $db;
    private int $id;
    private string $serialId;
    private string $name;
    private int $warranty;
    private int $customerId;

    public function __construct(?int $id = 0, ?string $serialId = null, ?string $name = null, ?int $warranty = 0, ?int $customerId = 0)
    {
        $this->id = $id;
        $this->serialId = $serialId;
        $this->$name = $name;
        $this->$warranty = $warranty;
        $this->customerId = $customerId;
        self::$db = DBConnect::getInstance()->getConnection();
    }

    public static function createProduct(Product $product): Product
    {
        $sql = "INSERT INTO product (serialId, name, warranty, customerId) VALUES (:serialId, :name, :warranty, :customerId)";
        $sth = self::$db->prepare($sql);
        $sth->bindValue('serialId', $product->getSerialId());
        $sth->bindValue('name', $product->getName());        
        $sth->bindValue('warranty', $product->getWarranty());        
        $sth->bindValue('customerId', $product->getCustomerId());  
        $sth->execute();
        
        if($sth->rowCount() > 0){
            $product->setId(self::$db->lastInsertId());
        }
        return $product;
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
    public function getCustomerId(): int
    {
        return $this->customerId;
    }

    /**
     * Set the value of customerId
     */
    public function setCustomerId(int $customerId): self
    {
        $this->customerId = $customerId;

        return $this;
    }
}