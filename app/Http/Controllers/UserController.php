<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\city;
use Carbon\Carbon;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = "All User's List";
        $all_user = User::where('user_type', '0')->paginate(10);


        return view('admin.user.index', compact('title', 'all_user'));
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
    //start search user city
    public function comilla(){
        $title = "Our Comilla Meambers";
        $data = User::all()->where('city_id', '1');
        return view('user.city.citys', compact('data','title'));
    }

    public function feni(){
        $title = "Our Feni Meambers";
        $data = User::all()->where('city_id', '2');
        return view('user.city.citys', compact('data','title'));
    }
    public function brahmanbaria(){
        $title = "Our Brahmanbaria Meambers";
        $data = User::all()->where('city_id', '3');
        return view('user.city.citys', compact('data','title'));
    }
    public function rangamati(){
        $title = "Our Rangamati Meambers";
        $data = User::all()->where('city_id', '4');
        return view('user.city.citys', compact('data','title'));
    }
    public function noakhali(){
        $title = "Our Noakhali Meambers";
        $data = User::all()->where('city_id', '5');
        return view('user.city.citys', compact('data','title'));
    }
    public function chandpur(){
        $title = "Our Chandpur Meambers";
        $data = User::all()->where('city_id', '6');
        return view('user.city.citys', compact('data','title'));
    }
    public function lakshmipur(){
        $title = "Our Lakshmipur Meambers";
        $data = User::all()->where('city_id', '7');
        return view('user.city.citys', compact('data','title'));
    }
    public function chattogram(){
        $title = "Our Chattogram Meambers";
        $data = User::all()->where('city_id', '8');
        return view('user.city.citys', compact('data','title'));
    }
    public function coxsbazar(){
        $title = "Our Coxsbazar Meambers";
        $data = User::all()->where('city_id', '9');
        return view('user.city.citys', compact('data','title'));
    }
    public function khagrachhari(){
        $title = "Our Khagrachhari Meambers";
        $data = User::all()->where('city_id', '10');
        return view('user.city.citys', compact('data','title'));
    }
    public function bandarban(){
        $title = "Our Bandarban Meambers";
        $data = User::all()->where('city_id', '11');
        return view('user.city.citys', compact('data','title'));
    }
    public function sirajganj(){
        $title = "Our Sirajganj Meambers";
        $data = User::all()->where('city_id', '12');
        return view('user.city.citys', compact('data','title'));
    }
    public function pabna(){
        $title = "Our Pabna Meambers";
        $data = User::all()->where('city_id', '13');
        return view('user.city.citys', compact('data','title'));
    }
    public function bogura(){
        $title = "Our Bogura Meambers";
        $data = User::all()->where('city_id', '14');
        return view('user.city.citys', compact('data','title'));
    }
    public function rajshahi(){
        $title = "Our Rajshahi Meambers";
        $data = User::all()->where('city_id', '15');
        return view('user.city.citys', compact('data','title'));
    }
    public function natore(){
        $title = "Our Natore Meambers";
        $data = User::all()->where('city_id', '16');
        return view('user.city.citys', compact('data','title'));
    }
    public function joypurhat(){
        $title = "Our Joypurhat Meambers";
        $data = User::all()->where('city_id', '17');
        return view('user.city.citys', compact('data','title'));
    }
    public function chapainawabganj(){
        $title = "Our Chapainawabganj Meambers";
        $data = User::all()->where('city_id', '18');
        return view('user.city.citys', compact('data','title'));
    }
    public function naogaon(){
        $title = "Our Naogaon Meambers";
        $data = User::all()->where('city_id', '19');
        return view('user.city.citys', compact('data','title'));
    }
    public function jashore(){
        $title = "Our Jashore Meambers";
        $data = User::all()->where('city_id', '20');
        return view('user.city.citys', compact('data','title'));
    }
    public function satkhira(){
        $title = "Our Satkhira Meambers";
        $data = User::all()->where('city_id', '21');
        return view('user.city.citys', compact('data','title'));
    }
    public function meherpur(){
        $title = "Our Meherpur Meambers";
        $data = User::all()->where('city_id', '22');
        return view('user.city.citys', compact('data','title'));
    }
    public function narail(){
        $title = "Our Narail Meambers";
        $data = User::all()->where('city_id', '23');
        return view('user.city.citys', compact('data','title'));
    }
    public function chuadanga(){
        $title = "Our Chuadanga Meambers";
        $data = User::all()->where('city_id', '24');
        return view('user.city.citys', compact('data','title'));
    }
    public function kushtia(){
        $title = "Our Kushtia Meambers";
        $data = User::all()->where('city_id', '25');
        return view('user.city.citys', compact('data','title'));
    }
    public function magura(){
        $title = "Our Magura Meambers";
        $data = User::all()->where('city_id', '26');
        return view('user.city.citys', compact('data','title'));
    }
    public function khulna(){
        $title = "Our Khulna Meambers";
        $data = User::all()->where('city_id', '27');
        return view('user.city.citys', compact('data','title'));
    }
    public function bagerhat(){
        $title = "Our Bagerhat Meambers";
        $data = User::all()->where('city_id', '28');
        return view('user.city.citys', compact('data','title'));
    }
    public function jhenaidah(){
        $title = "Our Jhenaidah Meambers";
        $data = User::all()->where('city_id', '29');
        return view('user.city.citys', compact('data','title'));
    }
    public function jhalakathi(){
        $title = "Our Jhalakathi Meambers";
        $data = User::all()->where('city_id', '30');
        return view('user.city.citys', compact('data','title'));
    }
    public function patuakhali(){
        $title = "Our Patuakhali Meambers";
        $data = User::all()->where('city_id', '31');
        return view('user.city.citys', compact('data','title'));
    }
    public function pirojpur(){
        $title = "Our Pirojpur Meambers";
        $data = User::all()->where('city_id', '32');
        return view('user.city.citys', compact('data','title'));
    }
    public function barisal(){
        $title = "Our Barisal Meambers";
        $data = User::all()->where('city_id', '33');
        return view('user.city.citys', compact('data','title'));
    }
    public function bhola(){
        $title = "Our Bhola Meambers";
        $data = User::all()->where('city_id', '34');
        return view('user.city.citys', compact('data','title'));
    }
    public function barguna(){
        $title = "Our Barguna Meambers";
        $data = User::all()->where('city_id', '35');
        return view('user.city.citys', compact('data','title'));
    }
    public function sylhet(){
        $title = "Our Sylhet Meambers";
        $data = User::all()->where('city_id', '36');
        return view('user.city.citys', compact('data','title'));
    }
    public function moulvibazar(){
        $title = "Our Moulvibazar Meambers";
        $data = User::all()->where('city_id', '37');
        return view('user.city.citys', compact('data','title'));
    }
    public function habiganj(){
        $title = "Our Habiganj Meambers";
        $data = User::all()->where('city_id', '38');
        return view('user.city.citys', compact('data','title'));
    }
    public function sunamganj(){
        $title = "Our Sunamganj Meambers";
        $data = User::all()->where('city_id', '39');
        return view('user.city.citys', compact('data','title'));
    }
    public function narsingdi(){
        $title = "Our Narsingdi Meambers";
        $data = User::all()->where('city_id', '40');
        return view('user.city.citys', compact('data','title'));
    }
    public function gazipur(){
        $title = "Our Gazipur Meambers";
        $data = User::all()->where('city_id', '41');
        return view('user.city.citys', compact('data','title'));
    }
    public function shariatpur(){
        $title = "Our Shariatpur Meambers";
        $data = User::all()->where('city_id', '42');
        return view('user.city.citys', compact('data','title'));
    }
    public function narayanganj(){
        $title = "Our Narayanganj Meambers";
        $data = User::all()->where('city_id', '43');
        return view('user.city.citys', compact('data','title'));
    }
    public function tangail(){
        $title = "Our Tangail Meambers";
        $data = User::all()->where('city_id', '44');
        return view('user.city.citys', compact('data','title'));
    }
    public function kishoreganj(){
        $title = "Our Kishoreganj Meambers";
        $data = User::all()->where('city_id', '45');
        return view('user.city.citys', compact('data','title'));
    }
    public function manikganj(){
        $title = "Our Manikganj Meambers";
        $data = User::all()->where('city_id', '46');
        return view('user.city.citys', compact('data','title'));
    }
    public function dhaka(){
        $title = "Our Dhaka Meambers";
        $data = User::all()->where('city_id', '47');
        return view('user.city.citys', compact('data','title'));
    }
    public function munshiganj(){
        $title = "Our Munshiganj Meambers";
        $data = User::all()->where('city_id', '48');
        return view('user.city.citys', compact('data','title'));
    }
    public function rajbari(){
        $title = "Our Rajbari Meambers";
        $data = User::all()->where('city_id', '49');
        return view('user.city.citys', compact('data','title'));
    }
    public function madaripur(){
        $title = "Our Madaripur Meambers";
        $data = User::all()->where('city_id', '50');
        return view('user.city.citys', compact('data','title'));
    }
    public function gopalganj(){
        $title = "Our Gopalganj Meambers";
        $data = User::all()->where('city_id', '51');
        return view('user.city.citys', compact('data','title'));
    }
    public function faridpur(){
        $title = "Our Faridpur Meambers";
        $data = User::all()->where('city_id', '52');
        return view('user.city.citys', compact('data','title'));
    }
    public function panchagarh(){
        $title = "Our Panchagarh Meambers";
        $data = User::all()->where('city_id', '53');
        return view('user.city.citys', compact('data','title'));
    }
    public function dinajpur(){
        $title = "Our Dinajpur Meambers";
        $data = User::all()->where('city_id', '54');
        return view('user.city.citys', compact('data','title'));
    }
    public function lalmonirhat(){
        $title = "Our Lalmonirhat Meambers";
        $data = User::all()->where('city_id', '55');
        return view('user.city.citys', compact('data','title'));
    }
    public function nilphamari(){
        $title = "Our Nilphamari Meambers";
        $data = User::all()->where('city_id', '56');
        return view('user.city.citys', compact('data','title'));
    }
    public function gaibandha(){
        $title = "Our Gaibandha Meambers";
        $data = User::all()->where('city_id', '57');
        return view('user.city.citys', compact('data','title'));
    }
    public function thakurgaon(){
        $title = "Our Thakurgaon Meambers";
        $data = User::all()->where('city_id', '58');
        return view('user.city.citys', compact('data','title'));
    }
    public function rangpur(){
        $title = "Our Rangpur Meambers";
        $data = User::all()->where('city_id', '59');
        return view('user.city.citys', compact('data','title'));
    }
    public function kurigram(){
        $title = "Our Kurigram Meambers";
        $data = User::all()->where('city_id', '60');
        return view('user.city.citys', compact('data','title'));
    }
    public function sherpur(){
        $title = "Our sherpur Meambers";
        $data = User::all()->where('city_id', '61');
        return view('user.city.citys', compact('data','title'));
    }
    public function mymensingh(){
        $title = "Our Mymensingh Meambers";
        $data = User::all()->where('city_id', '62');
        return view('user.city.citys', compact('data','title'));
    }
    public function jamalpur(){
        $title = "Our Jamalpur Meambers";
        $data = User::all()->where('city_id', '63');
        return view('user.city.citys', compact('data','title'));
    }
    public function netrokona(){
        $title = "Our Netrokona Meambers";
        $data = User::all()->where('city_id', '64');
        return view('user.city.citys', compact('data','title'));
    }

    // start search user bloog group 
    public function op_show(){

        $title = "O+ Positive";

        $op = User::all()->where('group_id', '8');

        return view('user.op', compact('op', 'title'));
    }

    public function on_show(){

        $title = "O- Negative";
        $on = User::all()->where('group_id', '9');

        return view('user.on', compact('on', 'title'));
    }

    public function ap_show(){
        $title = "A+ Positive";
        $ap = User::all()->where('group_id', '2');

        return view('user.ap', compact('ap', 'title'));
    }
    public function an_show(){
        $title = "A- Negative";
        $an = User::all()->where('group_id', '3');

        return view('user.an', compact('an', 'title'));
    }
    public function bp_show(){
        $title = "B+ Positive";
        $bp = User::all()->where('group_id', '4');

        return view('user.bp', compact('bp', 'title'));
    }
    public function bn_show(){
        $title = "B- Negative";
        $bn = User::all()->where('group_id', '5');

        return view('user.bn', compact('bn','title'));
    }
    public function abp_show(){
        $title = "AB+ Positive";
        $abp = User::all()->where('group_id', '6');

        return view('user.abp', compact('abp', 'title'));
    }
    public function abn_show(){
        $title = "AB- Negative";
        $abn = User::all()->where('group_id', '7');

        return view('user.abn', compact('abn', 'title'));
    }

    //End search bloog group

    public function allUser(){

        $title = "All User List";
        $allUser = User::where('user_type', '0')->paginate(10);
        $city = city::pluck('name','id');

        return view('user.allUser', compact('allUser','title', 'city'));
    }

    public function search(Request $request)
    {
        
        $keyword = $request->input('keyword');
        $city = city::pluck('name','id');
        $allUser = User::where('user_type', '0')->paginate(10);

        if ($keyword != "") {
        $User = User::where('city_id', 'LIKE','%'.$keyword.'$')
                    ->with('keyword',$keyword)
                    ->with('city',$city);
            return view('user.allUser', compact('User','city', 'allUser'));
        }
        
    }

    public function show($id)
    {
        $datas = User::findOrFail($id);

        // dd($datas);

        return view('user.userProfile', compact('datas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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
