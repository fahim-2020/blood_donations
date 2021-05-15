<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\city;

class cityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = "All City's";
        $all_citys = city::all();

        return view('admin.city.index', compact('title', 'all_citys'));
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

        $city = array(
            'name' => $request->name
        );

        city::create($city);

        return redirect()->back()->with('success', 'New City Created Successfully');
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
        $title = "City Update";
        $update = city::findOrFail($id);

        return view('admin.city.update', compact('title','update'));
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

        $city = array(
            'name' => $request->name
        );

        city::where('id',$id)->update($city);

        return redirect()->route('city.index')->with('success', 'City Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        city::where('id',$id)->delete();
        return redirect()->back()->with('success', 'City Delete Successfully');
    }
}
