<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TicketFormRequest;
use App\Ticket;
use Illuminate\Support\Facades\Mail;

class TicketsController extends Controller
{
	public function create()
	{
			return view('tickets.create');
	}
	public function store(TicketFormRequest $request)
	{
	 	$slug = 		uniqid();
			$ticket = new Ticket(array(
					'title' => $request->get('name'),
					'content' => $request->get('message'),
					'slug' => $slug
			));
			
			$ticket->save();
			
			$data = array(
				'ticket' => $slug,
		);
		Mail::send('emails.ticket', $data, function($message){
				$message->from('ken4ik.gamer@gmail.com', 'Learning Laravel');
				$message->to('taras.borovik@bk.ru')->subject('There is new ticket');			
		});
			
			return redirect('/create')->with('status', 'Your ticket has been created! Its unique id is: '.$slug);	
	}
	public function index()
	{
			$tickets = Ticket::all();
			return view('tickets.tickets', compact('tickets'));
	}
	public function show($slug)
	{
			$ticket = Ticket::whereSlug($slug)->first();
			$comments = $ticket->comments()->get();
			return view('tickets.show', compact('ticket', 'comments'));
	}
	public function edit($slug)
	{
			$ticket = Ticket::whereSlug($slug)->first();
			return view('tickets.edit', compact('ticket'));
	}
	public function update($slug, TicketFormRequest $request)
	{
			$ticket = Ticket::whereSlug($slug)->first();
			$ticket->title = $request->get('name');
			$ticket->content = $request->get('message');
			if($request->get('status') != null){
					$ticket->status = 0;
			} else {
					$ticket->status = 1;
			}
			$ticket->save();
			return redirect(action('TicketsController@edit', $ticket->slug))->with('status', 'The ticket '.$slug.' has been updated!');
	}
	public function destroy($slug)
	{
			$ticket = Ticket::whereSlug($slug)->first();
			$ticket->delete();
			return redirect('/tickets')->with('status', 'The ticket '.$slug.' has been deleted');
	}
	
}
