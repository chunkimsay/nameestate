<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class LocationController extends Controller
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
        $data['location'] = DB::table('locations')->where('active',1)
        ->paginate(config('app.row'));
       return view('back.location.index',$data);
    }


    public function create()
    {
       return view('back.location.create');
    }

    public function store(Request $request)
    {
     $data = $request->except('_token');
      $i =DB::table('locations')->insert($data);
      if($i)
      {
          return back()->with('success','Data has been saved successfully!');
      }
      else
      {
        return back()->with('error','Fail to saved data!');
      }
    }


    public function show($id)
    {
        //
    }

    public function edit($id)
    {
       $data['location'] = DB::table('locations')->find($id);
       return view('back.location.edit',$data);
    }

    public function update(Request $request, $id)
    {
        $data = array(
            'name'=> $request->name
        );
       $i = DB::table('locations')->where('id',$id)->update($data);
       if($i)
       {
           return redirect()->route('location.index')->with('success','Data has been updated!');
       }
       else
       {
           return back()->with('error','Fail to  update Data!');
       }
    }

    public function delete($id)
    {
        $i = DB::table('locations')->where('id',$id)
        ->update(['active'=>0]);
        if($i)
        {
            return back()->with('success','Data has been removed!');
        }
        else
        {
            return back()->with('success','Data has been removed!');
        }
    }
}
