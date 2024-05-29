<?php
namespace app\kahuna\api\model;

use app\kahuna\api\model\DBConnect;
use JsonSerializable;
use \PDO;

class Agent implements JsonSerializable
{
    private int $id;
    private ?string $name;
    private ?string $surname;
    private string $email;
    private string $password;
    private string $accessLevel = 'agent';
    private static $db;

    public function __construct(?string $name = null, ?string $surname = null, ?string $email = null, ?string $password = null, ?string $accessLevel = 'agent', ?int $id = 0)
    {
        $this->name = $name;
        $this->surname = $surname;
        $this->email = $email;
        $this->password = $password;
        $this->accessLevel = $accessLevel;
        $this->id = $id;
        self::$db = DBConnect::getInstance()->getConnection();
    }

    public static function register(Agent $agent)
    {
        $password = password_hash($agent->getPassword(), PASSWORD_DEFAULT);
        $sql = "INSERT INTO agent (name, surname, email, password, accessLevel) VALUES (:name, :surname, :email, :password, :accessLevel)";
        $sth = self::$db->prepare($sql);
        $sth->bindValue('name', $agent->getName());
        $sth->bindValue('surname', $agent->getSurname());
        $sth->bindValue('email', $agent->getEmail());
        $sth->bindValue('password', $password);
        $sth->bindValue('accessLevel', $agent->getAccessLevel());
        $sth->execute();

        if($sth->rowCount() > 0){
            $agent->setId(self::$db->lastInsertId());
        }

        return $agent;
    }

    public static function authenticate(Agent $agent)
    {
        $sql = "SELECT * FROM agent WHERE email=:email";
        $sth = self::$db->prepare($sql);
        $sth->bindValue('email', $agent->getEmail());
        $sth->execute();
        $result = $sth->fetch(PDO::FETCH_OBJ);
        if($result && password_verify($agent->getPassword(), $result->password)){   
            return new Agent(
                name: $result->name,
                surname:$result->surname,
                email: $result->email,
                password: $result->password,
                id: $result->id
            );
        }

        return null;
    }

    public function jsonSerialize(){
        return [
            "id"=>$this->id,
            "name"=>$this->name,
            "surname"=>$this->surname,
            "email"=>$this->email,
            "accessLevel"=>$this->accessLevel
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
     * Get the value of surname
     */
    public function getSurname(): string
    {
        return $this->surname;
    }

    /**
     * Set the value of surname
     */
    public function setSurname(string $surname): self
    {
        $this->surname = $surname;

        return $this;
    }

    /**
     * Get the value of email
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * Set the value of email
     */
    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of password
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    

    /**
     * Get the value of accessLevel
     */
    public function getAccessLevel(): string
    {
        return $this->accessLevel;
    }

    /**
     * Set the value of accessLevel
     */
    public function setAccessLevel(string $accessLevel): self
    {
        $this->accessLevel = $accessLevel;

        return $this;
    }
}