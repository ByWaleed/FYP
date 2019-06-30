<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

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
    protected $redirectTo = '/home';

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
            'fullname' => 'required|string|max:255',
            'email' => 'required|max:255|unique:users',
            'password' => 'required',
            'userType' => 'required',
            'position' => 'required',
            'contactNumber' => 'required',
            'doorNum'=> 'required',
            'streetName' => 'required',
            'postcode' => 'required',
            'city' => 'required',
            'country' => 'required',
            'NINum' => 'required',
            'userLevel'=> 'required',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
      // dd($data);
        return User::create([
            'fullname' => $data['fullname'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'userType' => $data['userType'],
            'userLevel'=> $data['userLevel'],
            'position' => $data['position'],
            'contactNumber' => $data['contactNumber'],
            'doorNum' => $data['doorNum'],
            'streetName' => $data['streetName'],
            'postcode' => $data['postcode'],
            'city' => $data['city'],
            'country' => $data['country'],
            'NINum' => $data['NINum'],

        ]);
    }
}
