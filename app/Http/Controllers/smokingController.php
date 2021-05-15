<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\smoking;

class smokingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = "Smoking Option";
        $all_smoking = smoking::all();

        return view('admin.smoking.index', compact('title', 'all_smoking'));
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

            'name'       => 'required|string'
        ]);
        $group = array(
                            'name'=>$request->name
                        );
        
            smoking::create($group);
            return redirect()->back()->with('success','New Option created Successfully');
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
        $update = smoking::findOrFail($id);
        $title = "smking Option update";

        return view('admin.smoking.update', compact('update', 'title'));
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

            'name'       => 'required|string'
        ]);
        $group = array(
                            'name'=>$request->name
                        );
        
            smoking::where('id',$id)->update($group);
            return redirect()->route('smoking.index')->with('success','Smoking Option update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        smoking::where('id',$id)->delete();
        return redirect()->back()->with('success', 'Smoking Option delete successfully');
    }
}
