<?php

namespace App\Listeners;

use App\Events\BlockAttempsUsers;
use App\User;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class UserBlockListener
{
    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(BlockAttempsUsers $event)
    {
        $user = User::where('email', $event->request->email);
        $user->update(['status' => false]);
    }
}
