<?php
namespace app\kahuna\api\model;

use app\kahuna\api\model\DBConnect;
use \PDO;

class AccessToken
{
    private static $db;
    private int $agentId;
    private string $token;

    public function __construct(int $agentId, ?string $token = null)
    {
        $this->agentId = $agentId;
        $this->token = $token ?? str_replace("=", "", base64_encode(random_bytes(160 / 8)));
        self::$db = DBConnect::getInstance()->getConnection();
    }

    public static function save(AccessToken $accessToken)
    {
        $sql = "INSERT INTO accesstoken(token, agentId) VALUES (:token, :agentId)";
        $sth = self::$db->prepare($sql);
        $sth->bindValue('token', $accessToken->getToken());
        $sth->bindValue('agentId', $accessToken->getAgentId());
        $sth->execute();
        return $accessToken;
    }
    
    public static function verify(AccessToken $accessToken)
    {
        $sql = "SELECT * FROM accesstoken WHERE agentId = :agentId AND token = :token";
        $sth = self::$db->prepare($sql);
        $sth->bindValue('agentId', $accessToken->getAgentId());
        $sth->bindValue('token', $accessToken->getToken());
        $sth->execute();
        $token = $sth->fetch(PDO::FETCH_OBJ);

        if($token){
            $birth = strtotime($token->birth);
            $age = abs(strtotime('now') - $birth);
            if($age < 3600){
                return true;
            }
        }
        return false;
    }

    public static function delete(AccessToken $accessToken)
    {
        $sql = "DELETE FROM accesstoken WHERE agentId = :agentId";
        $sth = self::$db->prepare($sql);
        $sth->bindValue('agentId', $accessToken->getAgentId());
        $sth->execute();
        if($sth->rowCount() > 0){
            return true;
        }
        return false;
    }

    /**
     * Get the value of agentId
     */
    public function getAgentId(): int
    {
        return $this->agentId;
    }

    /**
     * Set the value of agentId
     */
    public function setAgentId(int $agentId): self
    {
        $this->agentId = $agentId;

        return $this;
    }

    /**
     * Get the value of token
     */
    public function getToken(): string
    {
        return $this->token;
    }

    /**
     * Set the value of token
     */
    public function setToken(string $token): self
    {
        $this->token = $token;

        return $this;
    }
}