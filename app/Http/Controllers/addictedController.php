<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\addicted;

class addictedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = "Addicted";
        $all_addicted = addicted::all();
        return view('admin.addicted.index', compact('title','all_addicted'));
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

        $addicted = array(
            'name' => $request->name
        );

        addicted::create($addicted);

        return redirect()->back()->with('success','Addicted Option created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $title = "Update Addicted";
        $update = addicted::findOrFail($id);

        return view('admin.addicted.update', compact('title', 'update'));
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

        $addicted = array(
            'name' => $request->name
        );

        addicted::where('id',$id)->update($addicted);

        return redirect()->route('addicted.index')->with('success','Addicted Option Updete Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        addicted::where('id',$id)->delete();

        return redirect()->back()->with('success', 'delete successfully');
    }
}
