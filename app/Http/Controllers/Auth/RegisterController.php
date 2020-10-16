<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

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
            'title' => 'required|string|max:255',
            'firstname' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',

            'country' => 'required|string|max:255',


            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
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

        return User::create([
            'title' => $data['title'],
            'firstname' => $data['firstname'],
            'last_name' => $data['last_name'],
            'pics' => 'mainbg.jpg',
            'gender' => ' ',
            'country' => $data['country'],
            'postalcode' => ' ',
            'phone_number' => ' ',
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }

    public function showRegistrationForm()
    {
        $users = DB::select('select * from regions  ORDER BY country ASC');
        return view('auth.register', ['users' => $users]);
        // This will send the $region variable to the view
    }
    public function getzipcode()
    {
        //echo '1';
         $id  = Input::get('id') ;
        //echo $request->id;
       // exit;
        $users = DB::select("select * from regions where id ='$id'");
        foreach ($users as $user){
            echo $user->phone_prefix;
        }


        //return response()->json($states);
    }





}
