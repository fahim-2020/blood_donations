<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\groups;
use App\User;
use App\blood_req;
use App\contact;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index()
    {
        if(auth()->user()->user_type == 1){
            return $this->admin();
        }else {
            return $this->user();
        }

    }


    public function admin()
    {
        $title = "admin home";
        $donor = User::get()->where('user_type', 0);
        $blood_req = blood_req::get();        
        $op = User::all()->where('group_id', '8');
        $ap = User::all()->where('group_id', '2');
        $bp = User::all()->where('group_id', '4');
        $an = User::all()->where('group_id', '3');
        $bn = User::all()->where('group_id', '5');
        $abp = User::all()->where('group_id', '6');
        $abn = User::all()->where('group_id', '7');
        $on = User::all()->where('group_id', '9');
        $message = contact::all();

        return view('admin.index', compact('title', 'donor', 'blood_req', 'op','ap','bp','an','bn','abp','abn','on','message'));
    }


    public function user()
    {
        $title = "Welcome";

        $op = User::all()->where('group_id', '8');
        $ap = User::all()->where('group_id', '2');
        $bp = User::all()->where('group_id', '4');
        $an = User::all()->where('group_id', '3');
        $bn = User::all()->where('group_id', '5');
        $abp = User::all()->where('group_id', '6');
        $abn = User::all()->where('group_id', '7');
        $on = User::all()->where('group_id', '9');
        // dd($op);

        $latest_member = User::orderBy('id', 'desc')->take(10)->where('user_type', '0')->get();
        $recent_request = blood_req::orderBy('id', 'desc')->take(10)->where('status', '2')->get();
       

        // dd($latest_member);

        return view('user.index', compact('title','op','ap','bp','an','bn','abp','abn','on','latest_member','recent_request'));
    }

    
}
