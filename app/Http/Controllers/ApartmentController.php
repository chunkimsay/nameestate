<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class ApartmentController extends Controller
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
        $data['apartment'] = DB::table('apartments')->join('for','apartments.for_id','for.id')
        ->join('locations','apartments.location_id','locations.id')
        ->select('apartments.*','for.name as fname','locations.name as location')
        ->where('apartments.active',1)
        ->where('locations.active',1)
        ->orderBy('apartments.id','desc')
        ->paginate(config('app.row'));
        return view('back.apartment.index',$data);
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
        return view('back.apartment.create',$data);
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
       $data['photo'] = $request->file('photo')->store('uploads/apartments','custom');
      }

      $i = DB::table('apartments')->insert($data);
      if($i)
      {

        return redirect()->route('apartment.index')->with('success','Data has been saved!');
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

        $data['for'] = DB::table('for')->get();
        $data['apart'] = DB::table('apartments')->find($id);
        return view('back.apartment.edit',$data);
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
        $s = DB::table('apartments')->find($id);
        if($request->photo)
        {
            @unlink($s->photo);
            $data['photo'] = $request->file('photo')->store('uploads/apartments','custom');
        }
        $i = DB::table('apartments')->where('id',$id) ->update($data);
        if($i)
        {
            return redirect() ->route('apartment.index')->with('success','Data updated successfully!');
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
    public function disable($id)
    {
        $i = DB::table('apartments')->where('id',$id)->update(['active'=>0]);
        if($i)
    {
        return redirect() ->route('apartment.index')->with('success','Data Disable successfully!');
    }
    else
    {
        return back()->withInput()->with('error','Fail to Disable data!');
    }
    }
}
