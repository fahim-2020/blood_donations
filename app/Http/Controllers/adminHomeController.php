<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;

class adminHomeController extends Controller
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
        return view('admin.profile.index', compact('id', 'title'));
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
        $datas = User::findOrFail($id);

        // dd($datas);

        return view('admin.userProfile', compact('datas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $profile_data = User::findOrFail($id);
        $image = auth()->user()->image;

        // dd($image);

        return view('admin.profile.update', compact('profile_data','image'));
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
            return redirect()->route('admin.index')->with('success','Updated Successfully');
            
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

    // Start Amdin search blood group
    public function op_show(){

        $title = "O+ Positive";

        $op = User::all()->where('group_id', '8');

        return view('admin.find_group.op', compact('op', 'title'));
    }

    public function on_show(){

        $title = "O- Negative";
        $on = User::all()->where('group_id', '9');

        return view('admin.find_group.on', compact('on', 'title'));
    }

    public function ap_show(){
        $title = "A+ Positive";
        $ap = User::all()->where('group_id', '2');

        return view('admin.find_group.ap', compact('ap', 'title'));
    }

    public function an_show(){
        $title = "A- Negative";
        $an = User::all()->where('group_id', '3');

        return view('admin.find_group.an', compact('an', 'title'));
    }
    public function bp_show(){
        $title = "B+ Positive";
        $bp = User::all()->where('group_id', '4');

        return view('admin.find_group.bp', compact('bp', 'title'));
    }
    public function bn_show(){
        $title = "B- Negative";
        $bn = User::all()->where('group_id', '5');

        return view('admin.find_group.bn', compact('bn','title'));
    }
    public function abp_show(){
        $title = "AB+ Positive";
        $abp = User::all()->where('group_id', '6');

        return view('admin.find_group.abp', compact('abp', 'title'));
    }
    public function abn_show(){
        $title = "AB- Negative";
        $abn = User::all()->where('group_id', '7');

        return view('admin.find_group.abn', compact('abn', 'title'));
    }
    // End Amdin search blood group

   
}
