<?php
namespace app\kahuna\api\model;

use app\kahuna\api\model\DBConnect;
use \JsonSerializable;
use \PDO;

class Ticket implements JsonSerializable
{
    private static $db;

    private ?int $ticketId;
    private ?string $ticketNo;
    private ?string $ticketDate;
    private ?string $ticketMessage;
    private ?string $ticketReply;
    private ?int $agentId;
    private ?int $customerproductId;

    public function __construct(?int $ticketId = 0, ?string $ticketNo = null, ?string $ticketDate = null, ?string $ticketMessage = null, ?string $ticketReply = null, int $agentId = null, int $customerproductId = null)
    {
        $this->ticketId = $ticketId;
        $this->ticketNo = $ticketNo;
        $this->ticketDate = $ticketDate;
        $this->ticketMessage = $ticketMessage;
        $this->ticketReply = $ticketReply;
        $this->agentId = $agentId;
        $this->customerproductId = $customerproductId;
        self::$db = DBConnect::getInstance()->getConnection();
    }

    public static function getTickets(int $agentId)
    {
        self::$db = DBConnect::getInstance()->getConnection();
        $sql = "SELECT * FROM ticket WHERE ticket.agentId = :agentId";
        $sth = self::$db->prepare($sql);
        $sth->bindValue('agentId', $agentId);
        $sth->execute();
        $tickets = $sth->fetchAll(PDO::FETCH_FUNC, fn(...$fields) => new Ticket(...$fields));
        return $tickets;


    }

    public static function getTicket(int $ticketId, int $agentId)
    {
        self::$db = DBConnect::getInstance()->getConnection();
        $sql = "SELECT * FROM ticket WHERE ticket.agentId = :agentId AND ticket.id = :ticketId";
        $sth = self::$db->prepare($sql);
        $sth->bindValue('ticketId', $ticketId);
        $sth->bindValue('agentId', $agentId);
        $sth->execute();
        $ticket = $sth->fetchAll(PDO::FETCH_FUNC, fn(...$fields) => new Ticket(...$fields));
        return $ticket;
    }

    public static function replyTicket(Ticket $ticket)
    {
        $sql = "UPDATE ticket SET ticket.ticketReply = :ticketReply WHERE ticket.id = :ticketId AND ticket.agentId = :agentId";
        $sth = self::$db->prepare($sql);
        $sth->bindValue('ticketReply', $ticket->getTicketReply());
        $sth->bindValue('ticketId', $ticket->getTicketId());
        $sth->bindValue('agentId', $ticket->getAgentId());
        $sth->execute();
        $sql = "SELECT * FROM ticket WHERE ticket.id = :ticketId";
        $sth = self::$db->prepare($sql);
        $sth->bindValue('ticketId', $ticket->getTicketId());
        $sth->execute();
        $result = $sth->fetch(PDO::FETCH_ASSOC);
        $ticket->setTicketNo($result['ticketNo']);
        $ticket->setTicketDate($result['ticketDate']);
        $ticket->setTicketMessage($result['ticketMessage']);
        $ticket->setCustomerproductId($result['customerproductId']);
        // var_dump($ticket);
        return $ticket;
    }

    public function jsonSerialize()
    {
        return get_object_vars($this);
    }

    /**
     * Get the value of ticketNo
     */
    public function getTicketNo(): ?string
    {
        return $this->ticketNo;
    }

    /**
     * Set the value of ticketNo
     */
    public function setTicketNo(?string $ticketNo): self
    {
        $this->ticketNo = $ticketNo;

        return $this;
    }

    /**
     * Get the value of ticketDate
     */
    public function getTicketDate(): ?string
    {
        return $this->ticketDate;
    }

    /**
     * Set the value of ticketDate
     */
    public function setTicketDate(?string $ticketDate): self
    {
        $this->ticketDate = $ticketDate;

        return $this;
    }

    /**
     * Get the value of ticketMessage
     */
    public function getTicketMessage(): ?string
    {
        return $this->ticketMessage;
    }

    /**
     * Set the value of ticketMessage
     */
    public function setTicketMessage(?string $ticketMessage): self
    {
        $this->ticketMessage = $ticketMessage;

        return $this;
    }

    /**
     * Get the value of ticketReply
     */
    public function getTicketReply(): ?string
    {
        return $this->ticketReply;
    }

    /**
     * Set the value of ticketReply
     */
    public function setTicketReply(?string $ticketReply): self
    {
        $this->ticketReply = $ticketReply;

        return $this;
    }

    /**
     * Get the value of agentId
     */
    public function getAgentId(): ?int
    {
        return $this->agentId;
    }

    /**
     * Set the value of agentId
     */
    public function setAgentId(?int $agentId): self
    {
        $this->agentId = $agentId;

        return $this;
    }

    /**
     * Get the value of customerproductId
     */
    public function getCustomerproductId(): ?int
    {
        return $this->customerproductId;
    }

    /**
     * Set the value of customerproductId
     */
    public function setCustomerproductId(?int $customerproductId): self
    {
        $this->customerproductId = $customerproductId;

        return $this;
    }

    /**
     * Get the value of ticketId
     */
    public function getTicketId(): int
    {
        return $this->ticketId;
    }

    /**
     * Set the value of ticketId
     */
    public function setTicketId(int $ticketId): self
    {
        $this->ticketId = $ticketId;

        return $this;
    }
}