<?php


namespace App\Acme;


use App\Mail\UserNotification;
use App\Mail\UserRegistrationAdmin;
use App\User;
use Illuminate\Support\Facades\Mail;

class RegistrationMailer
{
    private $user;

    /**
     * RegistrationMailer constructor.
     * @param User $user
     */
    public function __construct($user)
    {
        $this->user = $user;
    }

    /**
     *
     */
    public function handler()
    {
        Mail::to($this->user->email)
            ->send(new UserNotification($this->user));

        Mail::to(explode(',', env('ADMIN_EMAILS')))
            ->send(new UserRegistrationAdmin($this->user));

    }
}
