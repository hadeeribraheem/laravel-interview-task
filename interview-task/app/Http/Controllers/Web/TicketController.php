<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\TicketRequest;
use App\Models\Tickets;
use Flasher\Laravel\Facade\Flasher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(auth()->user()->role === 'admin') {
            $tickets = Tickets::with('comments')->get();
        } else {
            //dd(Tickets::with('comments')->get());
            $tickets = Tickets::where('user_id', auth()->user()->id)->with('comments')->get();
            //dd(auth()->user()->id);
            //dd(Tickets::where('user_id', auth()->user()->id)->with('comments')->toSql());

            //dd(Tickets::where('user_id', auth()->user()->id)->with('comments')->toSql());
        }
        //dd($tickets);
        return view('tickets.show_tickets', compact('tickets'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $types = ['request', 'problem'];

        return view('tickets.insert_ticket',compact('types'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TicketRequest $request)
    {

        DB::beginTransaction();
        $data = $request->validated();
        $data['user_id'] = auth()->user()->id;
        //dd($data);
        Tickets::updateOrCreate(
            ['id' => $data['id'] ?? ''],
            $data
        );

        DB::commit();

        if (isset($data['id'])) {
            Flasher::addSuccess('Ticket updated Successfully');
            return redirect()->back();
        } else {
            Flasher::addSuccess('Ticket added Successfully');
            return redirect()->back();
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
