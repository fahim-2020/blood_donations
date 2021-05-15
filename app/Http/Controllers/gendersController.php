<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\genders;

class gendersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = "All Gender's";
        $all_genders = genders::all();

        return view('admin.gender.index', compact('title','all_genders'));
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
        $this->validate($request,[

            'name' => 'required|string'
        ]);

        $genders = array(
                'name' =>$request->name
        );

        genders::create($genders);

        return redirect()->back()->with('success','Gender created Successfully');
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
        $update = genders::findOrFail($id);
        $title = "Gender update";

        return view('admin.gender.update', compact('update', 'title'));
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
        $this->validate($request,[

            'name' => 'required|string'
        ]);

        $genders = array(
                'name' =>$request->name
        );

        genders::where('id',$id)->update($genders);

        return redirect()->route('genders.index')->with('success','Gender created Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        genders::where('id',$id)->delete();
        return redirect()->back()->with('success', 'delete successfully');
    }
}
