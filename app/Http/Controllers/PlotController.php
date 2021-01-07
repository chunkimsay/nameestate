<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class PlotController extends Controller
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
        $data['plot'] = DB::table('plots')->join('for','plots.for_id','for.id')
        ->join('locations','plots.location_id','locations.id')
        ->select('plots.*','for.name as fname','locations.name as location')
        ->where('plots.active',1)
        ->where('locations.active',1)
        ->orderBy('plots.id','desc')
        ->paginate(config('app.row'));
        return view('back.plot.index',$data);
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
        return view('back.plot.create',$data);
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
         $data['photo'] = $request->file('photo')->store('uploads/plots','custom');
      }

      $i = DB::table('plots')->insert($data);
      if($i)
      {

        return redirect()->route('plot.index')->with('success','Data has been saved!');
      }
      else
      {
          return redirect()->route('plot.create')->with('error','Fail to save data!')->withInput();
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
        $data['plot'] = DB::table('plots')->find($id);
        return view('back.plot.edit',$data);
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
            $data['photo'] = $request->file('photo')->store('uploads/plots','custom');
        }
        $i = DB::table('plots')->where('id',$id) ->update($data);
        if($i)
        {
            return redirect() ->route('plot.index')->with('success','Data updated successfully!');
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
        $i = DB::table('plots')->where('id',$id)->update(['active'=>0]);
        if($i)
    {
        return redirect() ->route('plot.index')->with('success','Data Remove successfully!');
    }
    else
    {
        return back()->withInput()->with('error','Fail to Remove data!');
    }
    }

}
