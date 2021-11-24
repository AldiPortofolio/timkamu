<?php

namespace App\Http\Controllers\Authentication;

use App\Http\Controllers\Controller;
use App\Http\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GetFormResetPassword extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function __invoke()
    {
        ini_set('memory_limit', '-1');
        $token = app('request')->input('token');
        $email = null;
        if($token) {
            $data = User::where('token', $token)->first();
            $email = $data->email ?? '';
        }
        $type = app('request')->input('type');

        $arrView = [
            'type'  => $type,
            'token' => $token,
            'email'  => $email
        ];

        return view('pages.reset-password', $arrView);
    }
}
