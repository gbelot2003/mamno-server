<?php


namespace App\Acme;


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
        $to = explode(',', env('ADMIN_EMAILS'));
        Mail::to($to)
            ->send(new UserRegistrationAdmin($this->user));
    }
}
