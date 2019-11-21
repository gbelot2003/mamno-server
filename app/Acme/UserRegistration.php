<?php


namespace App\Acme;


use App\AdicionalInfo;
use App\User;
use Dotenv\Exception\ValidationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserRegistration
{

    private $request;

    public function __construct($request)
    {
        $this->request = $request;
    }

    public function handler()
    {
        $repass = Hash::make($this->request->password);
        $this->request['password'] = $repass;
        $this->request['status'] = false;
        $user = User::create($this->request->all());
        $user->assignRole($this->request->role);
        return $user;

    }
}
