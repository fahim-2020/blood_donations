<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use App\genders;
use App\city;
use App\addicted;
use App\groups;
use App\smoking;
use Illuminate\Foundation\Auth\RegistersUsers;
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
            'mobile' => ['required','max:11'],
            'age' => ['required','max:2'],
            'weight' => ['required','max:2'],
            'dob' => ['required'],
            'gender_id' => ['required'],
            'city_id' => ['required'],
            'addicted_id' => ['required'],
            'smoking_id' => ['required'],
            'group_id' => ['required'],
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
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
        // dd('hello');
        $filename = null;

        $image= $data['image'];
        // return dd($image);
        $filename = time().'-'.rand('123',9).'.'.$image->getClientOriginalExtension();
        $image->move(public_path('user_image'),$filename);
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'age' => $data['age'],
            'weight' => $data['weight'],
            'mobile' => $data['mobile'],
            'dob' => $data['dob'],
            'password' => Hash::make($data['password']),
            'gender_id' => $data['gender_id'] ?? null,
            'city_id' => $data['city_id'] ?? null,
            'addicted_id' => $data['addicted_id'] ?? null,
            'smoking_id' => $data['smoking_id'] ?? null,
            'group_id' => $data['group_id'] ?? null,
            'image' => $filename,
        ]);
    }

     public function showRegistrationForm()
    {
        $gender = genders::all();
        $city = city::all();
        $addicted = addicted::all();
        $smoking = smoking::all();
        $group = groups::all();

        return view('auth.register', compact('gender','city','addicted','smoking','group'));
    }
}
