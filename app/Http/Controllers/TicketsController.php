<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewTicketPost;
use App\Ticket;
use Illuminate\Http\Request;

class TicketsController extends Controller
{
	/**
     * Send back all tickets as JSON
     *
     * @return Response
     */
    public function index()
    {
        return Ticket::get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request
     * @return Response
     * @todo   usage of TicketPost instead of Request
     */
    public function store(Request $request)
    {
        $success = false;
        $reason  = null;
        try {
            // Unable to use the TicketPost FormRequest validation with AngularJS due to 422 HTTP code error
            $this->validate($request, [
                'firstname' => 'required|max:255',
                'lastname'  => 'required|max:255',
                'email'     => 'required|email|max:255',
            ]);
        } catch (\Exception $e) {
            // validation or storage error
            $reason = $e->getMessage();
        }
        if (! $reason) {
            try {
                $ticket = Ticket::create(array(
        			'firstname' => $request->input('firstname'),
        			'lastname'  => $request->input('lastname'),
        			'email'     => $request->input('email'),
                    'token'     => Ticket::generateToken(),
                ));
                $success = true;
            } catch (\Exception $e) {
                // validation or storage error
                $reason = 'Sorry, an error occurred during the ticket creation';
            }
        }

        return array(
            'success' => $success,
            'reason'  => $reason,
        );
    }

	/**
	 * Update the specified resource in storage.
	 *
     * @param  Request
	 * @return Response
	 */
	public function update(Request $request)
	{
		$ticket  = Ticket::whereToken($request->input('token'))->first();
        $success = false;
        try {
            if (! $ticket || $ticket->redeemed_at) {
                // if ticket is unknown or already redeemed
                $reason = $ticket ? 'Ticket is already redeemed' : 'Ticket is unknown';
            } else {
                $ticket->redeemed_at = new \DateTime();
                $ticket->save();
                $success = true;
                $reason  = 'Ticket has been successfully redeemed';
            }
        } catch (\Exception $e) {
            // storage error
            $reason = 'Sorry, an error occurred during the ticket redemption';
        }

        return array(
            'success' => $success,
            'reason'  => $reason,
        );
	}
}
