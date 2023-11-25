<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;


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
    protected $redirectTo = RouteServiceProvider::HOME;

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
            'user_phone' => ['required', 'string'],
            'user_address' => ['required', 'string'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $data['user_type'] = 'user';

        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'user_phone' => $data['user_phone'],
            'user_address' => $data['user_address'],
            'user_type' => $data['user_type'],
        ]);
    }

    // function register for API
    protected function registerApi(Request $request)
    {
        $validated = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
            'user_phone' => ['required', 'string'],
            'user_address' => ['required', 'string'],
        ]);

        if ($validated->fails()) {
            $failed = $validated->errors()->all();
            return response()->json([
                'error' => 500,
                'message' => $failed
            ]);
        } else {
            // Menambahkan 'user_type' ke dalam data yang akan disimpan
            $data = $request->all();
            $data['user_type'] = 'user';

            $user = User::create(array_merge($data, [
                'password' => bcrypt($request->password)
            ]));

            if ($user) {
                return response()->json([
                    'success' => 201,
                    'message' => 'YOUR REGISTRATION IS SUCCESSFUL!',
                    'user' => $user
                ]);
            } else {
                return response()->json([
                    'error' => 500,
                    'message' => 'YOUR REGISTRATION IS FAILED!',
                ]);
            }
        }
    }

}
