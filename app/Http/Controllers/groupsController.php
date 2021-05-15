<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\groups;
use App\Log;

class groupsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = "All Blood Group's";

        $all_groups = groups::all();
        return view('admin.groups.index', compact('title','all_groups'));
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

            'name'       => 'required|string',
            'image'       => 'required',
        ]);

        // dd('hello');
        $filename = null;

        $image= $request['image'];
        // return dd($image);
        $filename = time().'-'.rand('123',9).'.'.$image->getClientOriginalExtension();
        $image->move(public_path('group_image'),$filename);


        $group = array(
                            'name'=>$request->name,
                            'image'=>$filename
                        );
        
            groups::create($group);
            return redirect()->back()->with('success','blood gorup created Successfully');
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
        $update = groups::findOrFail($id);
        $title = "blood group update";

        return view('admin.groups.update', compact('update', 'title'));
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

            'name'       => 'required|string',
            'image'       => 'required',
        ]);

        try {
            $filename = null;

            if (empty($request->image)) {
                $value = array(
                    'name'=>$request->name,
                    'image'=>$filename);
            }else {
                $image = $request->image;
                $filename = time().'-'.rand('12345',9).'.'.$image->getClientOriginalExtension();

                // $path = 'uploads/IMG_1921.jpg'
                $path = public_path($image->move('group_image', $filename));

                $value = array(
                    'name'=>$request->name,
                    'image'=>$filename);
            }

            groups::where('id',$id)->update($value);
            return redirect()->route('groups.index')->with('success','blood gorup update Successfully');
            
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
        groups::where('id',$id)->delete();
        return redirect()->back()->with('success', 'delete successfully');
    }
}
