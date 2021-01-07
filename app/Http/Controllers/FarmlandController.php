<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class FarmlandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $data['farmland'] = DB::table('farmlands')->join('for','farmlands.for_id','for.id')
        ->join('locations','farmlands.location_id','locations.id')
        ->select('farmlands.*','for.name as fname','locations.name as location')
        ->where('farmlands.active',1)
        ->where('locations.active',1)
        ->orderBy('farmlands.id','desc')
        ->paginate(config('app.row'));

       return view('back.farmland.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['local'] = DB::table('locations')
        ->where('active',1)->get();
        $data['for'] = DB::table('for')->get();
        return view('back.farmland.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->except('_token','photo');
        if($request->photo)
        {
           $data['photo'] = $request->file('photo')->store('uploads/farmlands','custom');
        }

        $i = DB::table('farmlands')->insert($data);
        if($i)
        {

          return redirect()->route('farmland.index')->with('success','Data has been saved!');
        }
        else
        {
            return redirect()->back()->with('error','Fail to save data!')->withInput();
        }
      }



    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $data['local'] = DB::table('locations')
        ->where('active',1)->get();
        $data['for'] = DB::table('for')->get();
        $data['farm'] = DB::table('farmlands')->find($id);
        return view('back.farmland.edit',$data);
    }


    public function update(Request $request, $id)
    {
        $data = $request->except('_token','_method','photo');
        $s = DB::table('farmlands')->find($id);
        if($request->photo)
        {
            @unlink($s->photo);
            $data['photo'] = $request->file('photo')->store('uploads/farmlands','custom');
        }
        $i = DB::table('farmlands')->where('id',$id) ->update($data);
        if($i)
        {
            return redirect() ->route('farmland.index')->with('success','Data updated successfully!');
        }
        else
        {
            return back()->withInput()->with('error','Fail to updated data');
        }
    }


    public function delete($id)
    {
        $i = DB::table('farmlands')->where('id',$id)->update(['active'=>0]);
        if($i)
    {
        return redirect() ->route('farmland.index')->with('success','Data Remove successfully!');
    }
    else
    {
        return back()->withInput()->with('error','Fail to Remove data!');
    }
    }
}
