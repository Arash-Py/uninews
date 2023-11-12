<?php

namespace App\Http\Controllers\Api\V1\Watchman;

use App\Filter\Api\V1\TicketFilter;
use App\Http\Controllers\Controller;
use App\Models\Ticket;
use App\Services\Api\V1\TicketService;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function __construct(private TicketService $service)
    {
    }

    public function index(TicketFilter $filter)
    {
        return $this->service->getTickets($filter);
    }
//TODO validation
    public function submit(Request $request)
    {
        return $this->service->newTicket($request);
    }

    public function reply(Request $request, Ticket $ticket)
    {
        return $this->service->replyTicket($request, $ticket);
    }

    public function messages(Ticket $ticket)
    {
        return $this->service->ticketDetails($ticket);
    }
}
