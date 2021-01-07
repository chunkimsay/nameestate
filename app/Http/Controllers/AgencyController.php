<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class AgencyController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $data['agency'] = DB::table('agency')->where('active',1)->paginate(config('app.row'));
         return view('back.agency.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back.agency.create');
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
           $data['photo'] = $request->file('photo')->store('uploads/agencys','custom');
        }

        $i = DB::table('agency')->insert($data);
        if($i)
        {

          return redirect()->route('agency.index')->with('success','Data has been saved!');
        }
        else
        {
            return redirect()->route('agency.create')->with('error','Fail to save data!')->withInput();
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
        $data['agen']= DB::table('agency')->find($id);
       return view('back.agency.edit',$data);
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
            $data['photo'] = $request->file('photo')->store('uploads/agency','custom');
        }
        $i = DB::table('agency')->where('id',$id) ->update($data);
        if($i)
        {
            return redirect() ->route('agency.index')->with('success','Data updated successfully!');
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
        $i = DB::table('agency')->where('id',$id)->update(['active'=>0]);
        if($i)
        {
            return back()->with('success','Data has been removed');
        }
        else
        {
            return back()->with('erro','Fail to remve data!');
        }

}
}
