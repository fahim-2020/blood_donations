<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use App\User;
use App\genders;
use App\city;
use App\addicted;
use App\groups;
use App\smoking;

class profileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = "Profile";
        $id = Auth::id();
        return view('profile.profile', compact('id', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $title = "Update Profile";
        $profile_data = User::findOrFail($id);
        $image = auth()->user()->image;

        // dd($image);

        return view('profile.update', compact('profile_data','image','title'));
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'mobile' => ['required'],
            'last_don' => ['required'],
            'age' => ['required', 'max:2'],
            'weight' => ['required', 'max:2'],
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {

            $filename = null;
            if(empty($request->image)){
                $data = array(

                    'name' => $request->name,
                    'email' => $request->email,
                    'mobile' => $request->mobile,
                    'age' => $request->age,
                    'weight' => $request->weight,
                    'last_don' => $request->last_don,
                );
            }else {
                $filename = time().'-'.rand('1234',9).'.'.$request->image->getClientOriginalExtension();
                $request->image->move(public_path('user_image'),$filename);
                $data = array(
                    'name' => $request->name,
                    'email' => $request->email,
                    'mobile' => $request->mobile,
                    'age' => $request->age,
                    'weight' => $request->weight,
                    'last_don' => $request->last_don,
                    'image' => $filename
                );
            }



            User::where('id', $id)->update($data);
            return redirect()->route('profile.index')->with('success','Updated Successfully');
            
        } catch (Exception $ex) {
            Log::error($ex);
            return redirect()->back()->withInput()->withErrors("Something went wrong. Please try again.");
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function showRegistrationForm()
    {
        $gender = genders::all();
        $city = city::all();
        $addicted = addicted::all();
        $smoking = smoking::all();
        $group = groups::all();

        return view('profile.update', compact('gender','city','addicted','smoking','group'));
    }
}
