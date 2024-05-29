<?php
namespace app\kahuna\api\controller;

use app\kahuna\api\model\Ticket;

class TicketController extends Controller
{
    public static function getTickets($params, $data)
    {
        if(self::checkToken($data)){
            $agentId = $data['api_user'];
            $tickets = Ticket::getTickets($agentId);
            self::sendResponse(data: $tickets, code: 200);
        }else{
            self::sendResponse(code: 403, error: 'Missing, invalid or expired token.');
        }
    }

    public static function getTicket($params, $data)
    {
        if(self::checkToken($data)){
            $ticketId = $params['id'];
            $agentId = $data['api_user'];
            $ticket = Ticket::getTicket(ticketId: $ticketId, agentId: $agentId);
            self::sendResponse(data: $ticket, code: 200);
        }else{
            self::sendResponse(code: 403, error: 'Missing, invalid or expired token.');
        }
    }

    public static function replyTicket($params, $data)
    {
        if(self::checkToken($data)){
            $agentId = $data['api_user'];
            $ticketId = $data['id'];
            $ticketReply = $data['ticketReply'];
            $ticket = new Ticket(ticketId:$ticketId, ticketReply: $ticketReply, agentId: $agentId);
            $ticket = Ticket::replyTicket($ticket);
            self::sendResponse(data: $ticket ,code: 201);

        }else{
            self::sendResponse(code: 403, error: 'Missing, invalid or expired token.');
        }  
    }




}
