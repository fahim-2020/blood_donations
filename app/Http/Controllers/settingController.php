<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\setting;

class settingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = "Setting";
        // dd($data);
        return view('admin.setting.index',compact('title'));
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
        $update = setting::findOrFail($id);
        $title = "Setting Update";
        return view('admin.setting.update', compact('update', 'title'));
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

            'email'       => 'required|email',
            'mobile'       => 'required|max:11',
            'adderss'       => 'required',
            'logo_lg'       => 'required',
            'logo_sm'       => 'required',
        ]);

        try {
            $logolg = null;
            $logosm = null;

            if (empty($request->logo_lg)) {
                
                $value = array(
                    'email'=>$request->email,
                    'mobile'=>$request->mobile,
                    'adderss'=>$request->adderss,
                    'logo_lg'=>$logolg,
                    'logo_sm'=>$logosm);

            }elseif (empty($request->logo_sm)) {
                 
                 $value = array(
                    'email'=>$request->email,
                    'mobile'=>$request->mobile,
                    'adderss'=>$request->adderss,
                    'logo_lg'=>$logolg,
                    'logo_sm'=>$logosm);

            }else {

                $logo_lg = $request->logo_lg;
                $logolg = time().'-'.rand('12345',9).'.'.$logo_lg->getClientOriginalExtension();
                // $path = 'uploads/IMG_1921.jpg'
                $path = public_path($logo_lg->move('img/logo', $logolg));

                $logo_sm = $request->logo_sm;
                $logosm = time().'-'.rand('12345',9).'.'.$logo_sm->getClientOriginalExtension();

                // $path = 'uploads/IMG_1921.jpg'
                $path = public_path($logo_sm->move('img/logo', $logosm));
                $value = array(
                    'email'=>$request->email,
                    'mobile'=>$request->mobile,
                    'adderss'=>$request->adderss,
                    'logo_lg'=>$logolg,
                    'logo_sm'=>$logosm);
                // dd($value);
            }

            setting::where('id',$id)->update($value);
            return redirect()->route('setting.index')->with('success','Setting update Successfully');
            
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
}
