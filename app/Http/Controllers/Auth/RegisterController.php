<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Http\Models\User;

use Carbon\Carbon;
use \Guzzle;
use Auth;

use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Http\Models\User
     */
    protected function create(array $data)
    {
        $maxUserId = DB::table('users')->max('id');
        $accountNumber = Carbon::now()->format('dmy') . str_pad(($maxUserId + 1), 4, 0, STR_PAD_LEFT);

        $otpCode = rand(111111, 999999);
        try {
            DB::beginTransaction();

            User::create([
                'account_number' => $accountNumber,
                'name'           => $data['name'],
                'email'          => $data['email'],
                'phone'          => $data['phone'],
                'otp_code'       => $otpCode,
                'password'       => Hash::make($data['password'])
            ]);

            $message = 'Registration successful. ' . $otpCode . ' is your OTP. Do not share with anyone';

            $req = [
                'apikey'        => ENV('RAJA_SMS_API_KEY'),
                'senderid'      => '1',
                'callbackurl'   => '',
                'datapacket'    => [
                    [
                        'number'  => '62'.$data['phone'],
                        'message' => $message
                    ]
                ]
            ];

            // $client = new \GuzzleHttp\Client();
            // $res = $client->request(
            //     'POST',
            //     ENV('RAJA_SMS_URL'),
            //     [
            //         'headers' => [
            //             'Content-Type'  => 'application/json'
            //         ],
            //         'body'    => json_encode($req)
            //     ]
            // );

            // $body = json_decode($res->getBody()->getContents());
            // dd($body);

            DB::commit();

            return redirect('/')->with('success', 'Your account has been successfuly registered!');
        } catch (\Exception $e) {

            dd($e->getMessage());
            DB::rollback();
            return redirect('register')->with('failed', 'There is something wrong. Please try again later!');
        }
    }
}
