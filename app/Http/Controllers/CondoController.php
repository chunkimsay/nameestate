<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class CondoController extends Controller
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
        $data['condo'] = DB::table('condo')
        ->join('for','condo.for_id','for.id')
        ->Join('locations','condo.location_id','locations.id')
        ->select('condo.*','locations.name as lname','for.name as fname')
        ->where('condo.active',1)
        ->where('locations.active',1)
        ->orderBy('condo.id','desc')
        ->paginate(config('app.row'));
      return view('back.condo.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['for'] = DB::table('for')->get();
        $data['local'] = DB::table('locations')->where('active',1)->get();
       return view('back.condo.create',$data);
    }


    public function store(Request $request)
    {

        $data = $request->except('photo','_token','bigphoto');
        $file = $request->file('photo');

        if($request->bigphoto)
        {
            $data['bigphoto'] = $request->file('bigphoto')->store('uploads/condo','custom');
        }
         $r = DB::table('condo')->insert($data);
        if($request->photo)
        {
            foreach($file as $file)
            {

                $file = array(
                    'photo' => $file->store('uploads/condo','custom'),
                    'condo_id'=>  DB::table('condo')->max('id')
                );
                $i = DB::table('photo')->insert($file);


            }

        }


        if($r)
        {
            return redirect()->route('condo.index')->with('success','Data has been updated successfully');
        }
        else
        {
            return back()->withInput()->with('error','Fail to update data');
        }
    }


    public function show($id)
    {

    }


    public function edit($id)
    {

        $data['for'] = DB::table('for')->get();
        $data['local'] = DB::table('locations')
        ->where('active',1)->get();
        $data['condo'] = DB::table('condo')->find($id);
        $data['photo'] = DB::table('photo')->where('condo_id',$id)->where('active',1)->get();

        return view('back.condo.edit',$data);
    }


    public function update(Request $request, $id)
    {

        $data = $request->except('photo','_token','bigphoto','_method');
        $file = $request->file('photo');

        if($request->bigphoto)
        {
            $data['bigphoto'] = $request->file('bigphoto')->store('uploads/condo','custom');
        }
         $r = DB::table('condo')->where('id',$id)->update($data);
        if($request->photo)
        {
           $d = DB::table('photo')->where('condo_id',$id);
           @unlink($d->photo);
           $s= DB::table('photo')->where('condo_id',$id)->delete();

            foreach($file as $file)
            {

                $file = array(
                    'photo' => $file->store('uploads/condo','custom'),
                    'condo_id'=>$id
                );
                $i = DB::table('photo')->insert($file);

            }


        }
        if($r || $i)
        {
            return redirect()->route('condo.index')->with('success','Data has been updated successfully');
        }
        else
        {
            return back()->withInput()->with('error','Fail to update data');
        }
    }


    public function delete($id)
    {
        $i = DB::table('condo')
        ->where('id',$id)->update(['active'=>0]);
        $r =DB::table('photo')->where('condo_id',$id)->update(['active'=>0]);
        if($i)
    {
        return redirect() ->route('condo.index')->with('success','Data Remove successfully!');
    }
    else
    {
        return back()->withInput()->with('error','Fail to Remove data!');
    }
    }
}
