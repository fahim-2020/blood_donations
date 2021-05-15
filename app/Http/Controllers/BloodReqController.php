<?php

namespace App\Http\Controllers;

use App\blood_req;
use Illuminate\Http\Request;
use App\User;
use App\genders;
use App\city;
use App\groups;
use DB;

class BloodReqController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = "Blood Request Form";
        
        $city = city::pluck('name','id');
        $blood = groups::pluck('name','id');
        $gender = genders::pluck('name','id');
        return view('blood_request.index', compact('title','city','blood','gender'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // show all request
    public function create() 
    {
        $title = "All Request";
        $req = blood_req::orderBy('id', 'desc')->get();


        return view('blood_request.show', compact('req', 'title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd('hello');
        $this->validate($request,[
            'name' => 'required|string',
            'email' => 'required|email',
            'gender' => 'required',
            'city' => 'required',
            'group' => 'required',
            'age' => 'required',
            'mobile' => 'required',
            'unit' => 'required',
            'date' => 'required|date',
            'hospital' => 'required|string',
            'disease' => 'required|string',
            'your_name' => 'required|string',
        ]);
        // dd('hello');
        $data = array(
            'name' => $request->name,
            'email' => $request->email,
            'gender' => $request->gender,
            'city' => $request->city,
            'group' => $request->group,
            'age' => $request->age,
            'mobile' => $request->mobile,
            'unit' => $request->unit,
            'date' => $request->date,
            'hospital' => $request->hospital,
            'disease' => $request->disease,
            'your_name' => $request->your_name,
        );
        // dd($data);

        blood_req::create($data);
        
        return redirect()->back()->with('success', 'Your Request Successfully Send');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\bloodReq  $bloodReq
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $title = "Blood Request";
        $data = blood_Req::FindOrFail($id);
        // $data->status = 4;
        // $data->save();
        return view('blood_request.single', compact('data', 'title'));
    }
    
     public function usershow($id)
    {
        $title = "Blood Request";
        $data = blood_Req::FindOrFail($id);

        return view('user.single_req', compact('data', 'title'));
    }

    public function changeStatus(Request $request)
    {
          
        $order = blood_Req::find($request->id); 
        $order->status = '2';
        $order->update(); 
        return redirect()->route('bloodReq.create');
    }
    public function cancelStatus(Request $request)
    {
          
        $order = blood_Req::find($request->id); 
        $order->status = '0';
        $order->update(); 
        return redirect()->route('bloodReq.create');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\bloodReq  $bloodReq
     * @return \Illuminate\Http\Response
     */
    public function edit(bloodReq $bloodReq)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\bloodReq  $bloodReq
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, bloodReq $bloodReq)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\bloodReq  $bloodReq
     * @return \Illuminate\Http\Response
     */
    public function destroy(bloodReq $bloodReq)
    {
        //
    }
}
