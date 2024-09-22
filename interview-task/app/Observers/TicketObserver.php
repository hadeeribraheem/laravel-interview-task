<?php

namespace App\Observers;

use App\Models\Tickets;
use App\Models\User;
use App\Notifications\add_ticket;

class TicketObserver
{
    /**
     * Handle the Tickets "created" event.
     */
    public function created(Tickets $tickets): void
    {
        $user = User::query()->where('role','=','admin')->first();
        $user->notify(new add_ticket($tickets));
    }

    /**
     * Handle the Tickets "updated" event.
     */
    public function updated(Tickets $tickets): void
    {

    }

    /**
     * Handle the Tickets "deleted" event.
     */
    public function deleted(Tickets $tickets): void
    {
        //
    }

    /**
     * Handle the Tickets "restored" event.
     */
    public function restored(Tickets $tickets): void
    {
        //
    }

    /**
     * Handle the Tickets "force deleted" event.
     */
    public function forceDeleted(Tickets $tickets): void
    {
        //
    }
}
