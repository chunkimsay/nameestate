<?php

namespace App\Http\Controllers;

use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class Bannercontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()

    {
        $this ->middleware('auth');
    }
    public function index()
    {
        $data['banner'] = DB::table('banner')->join('for','banner.for_id','for.id')
        ->select('banner.*','for.name as fname')->where('banner.active',1)->paginate(config('app.row'));
        return view('back.banner.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['local'] = DB::table('locations')->where('active',1)->get();
       $data['for'] = DB::table('for')->get();
        return view('back.banner.create',$data);
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
         $data['photo'] = $request->file('photo')->store('uploads/banners','custom');
      }


      $i = DB::table('banner')->insert($data);
      if($i)
      {

        return redirect()->route('banner.index')->with('success','Data has been saved!');
      }
      else
      {
          return redirect()->route('banner.create')->with('error','Fail to save data!')->withInput();
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
        $data['local'] = DB::table('locations')->where('active',1)->get();
        $data['for'] = DB::table('for')->get();
        $data['banner'] = DB::table('banner')->find($id);
        $data['se'] = DB::table('banner')->min('sequence','sequece');
        return view('back.banner.edit',$data);
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

        if($request->photo)
        {
            $data['photo'] = $request->file('photo')->store('uploads/banners','custom');
        }
        $i = DB::table('banner')->where('id',$id) ->update($data);

        if($i )
        {
            return redirect() ->route('banner.index')->with('success','Data updated successfully!');
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
        $i = DB::table('banner')->where('id',$id)->update(['active'=>0]);
        if($i)
        {
            return back()->with('success','Data has been remove');
        }
        else
        {
            return back()->with('error','Data Fail to remove');
        }

    }
}
