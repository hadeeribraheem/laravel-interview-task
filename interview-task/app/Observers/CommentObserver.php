<?php

namespace App\Observers;

use App\Models\Comments;
use App\Models\User;
use App\Notifications\add_comment;

class CommentObserver
{
    /**
     * Handle the Comments "created" event.
     */
    public function created(Comments $comments): void
    {
        //get owner of ticket
        $ticketOwner = $comments->ticket->user;
        if ($ticketOwner) {
            $ticketOwner->notify(new add_comment($comments));
        }

        //notify user with new comment addded
        $admin = User::query()->where('role', 'admin')->first();
        if ($admin) {
            $admin->notify(new add_comment($comments));
        }
    }

    /**
     * Handle the Comments "updated" event.
     */
    public function updated(Comments $comments): void
    {
        //
    }

    /**
     * Handle the Comments "deleted" event.
     */
    public function deleted(Comments $comments): void
    {
        //
    }

    /**
     * Handle the Comments "restored" event.
     */
    public function restored(Comments $comments): void
    {
        //
    }

    /**
     * Handle the Comments "force deleted" event.
     */
    public function forceDeleted(Comments $comments): void
    {
        //
    }
}
