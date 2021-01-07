<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class HouseController extends Controller
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
        $data['home'] = DB::table('home')->join('for','home.for_id','for.id')
        ->join('locations','home.location_id','locations.id')
        ->select('home.*','for.name as fname','locations.name as location')
        ->where('home.active',1)
        ->where('locations.active',1)
        ->paginate(config('app.row'));
        return view('back.home.index',$data);
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
        return view('back.home.create',$data);
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
           $data['photo'] = $request->file('photo')->store('uploads/homes','custom');
        }

        $i = DB::table('home')->insert($data);
        if($i)
        {

          return redirect()->route('home.index')->with('success','Data has been saved!');
        }
        else
        {
            return redirect()->back()->with('error','Fail to save data!')->withInput();
        }
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
        $data['local'] = DB::table('locations')
        ->where('active',1)->get();
        $data['home'] = DB::table('home')->find($id);
        $data['for'] = DB::table('for')->get();
        return view('back.home.edit',$data);
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
        $data = $request->except('_token','_method','photo');
        $s = DB::table('home')->find($id);
        if($request->photo)
        {
            @unlink($s->photo);
            $data['photo'] = $request->file('photo')->store('uploads/homes','custom');
        }
        $i = DB::table('home')->where('id',$id) ->update($data);
        if($i)
        {
            return redirect() ->route('home.index')->with('success','Data updated successfully!');
        }
        else
        {
            return back()->withInput()->with('error','Fail to updated data');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $i = DB::table('home')->where('id',$id)->update(['active'=>0]);
        if($i)
    {
        return redirect() ->route('home.index')->with('success','Data Remove successfully!');
    }
    else
    {
        return back()->withInput()->with('error','Fail to Remove data!');
    }
    }
}
