<?php

namespace App\Services\Api\V1;

use App\Enums\TicketStatus;
use App\Enums\TicketType;
use App\Filter\Api\V1\TicketFilter;
use App\Http\Resources\Api\V1\Watchman\TicketMessageResource;
use App\Http\Resources\Api\V1\Watchman\TicketResource;
use App\Models\Ticket;
use App\Services\Service;
use Illuminate\Http\Request;

class TicketService extends Service
{
    public function model()
    {
        $this->model = Ticket::class;
    }

    public function __construct(private AuthService $authService)
    {
    }

    public function getTickets(TicketFilter $filter)
    {
        $user = $this->authService->getUser();
        $tickets = $user['user']->tickets()->filter($filter)->paginate(20);

        return $this->success(TicketResource::collection($tickets));
    }

    public function newTicket(Request $request)
    {
        $user = $this->authService->getUser();
        $ticket = $this->createTicket($request,$user);
        $this->newMessage($request, $ticket,$user);

        return $this->noContent();
    }

    private function createTicket(Request $request, $user){
        return $user['user']->tickets()->create([
            'title' => $request->title,
            'status' => TicketStatus::wait_for_answer,
            'type' => $request->type,
        ]);
    }

    private function newMessage(Request $request, Ticket $ticket, $messageable)
    {
        return $ticket->messages()->create([
            'message' => json_encode($request->massage),
            'messageable_type' => $messageable['guard'],
            'messageable_id' => $messageable['user']->id
        ]);
    }

    public function ticketDetails(Ticket $ticket): \Illuminate\Http\JsonResponse
    {
        $messages = $ticket->messages()->with('messageable')->orderByDesc('id')->get();
        return $this->success(TicketMessageResource::collection($messages));
    }

    public function replyTicket(Request $request, Ticket $ticket): \Illuminate\Http\Response
    {
        $user = $this->authService->getUser();
        $this->newMessage($request, $ticket, $user);
        return $this->noContent();
    }
}
