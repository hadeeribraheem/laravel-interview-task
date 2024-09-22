<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\CommentsRequest;
use App\Models\Comments;
use App\Models\Tickets;
use Flasher\Laravel\Facade\Flasher;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(CommentsRequest $request, $ticketId)
    {
        $data = $request->validated();
        //dd($data);
        $data['ticket_id'] = $ticketId;
        $data['user_id'] = auth()->id();

        //dd($data);
        Comments::create($data);

        Flasher::addSuccess('Comment Added Successfully');
        return view('tickets.show_tickets',compact('ticketId'));

    }
}
