<?php

namespace App\Http\Controllers\front;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AgencyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        //agency
        $data['agency'] = DB::table('agency')->where('active',1)->get();
        //$data['agency'] = DB::table('agency')->where('active',1);
        // search
          $a = DB::table('condo')->min('price');

          $b = DB::table('apartments')->min('price');
          $c = DB::table('home')->min('price');
          $d = DB::table('farmlands')->min('price');
          $e = DB::table('plots')->min('price');
          $f = DB::table('apartments')->max('price');
          $g = DB::table('home')->max('price');
          $h = DB::table('farmlands')->max('price');
          $i = DB::table('plots')->max('price');
          $j = DB::table('condo')->max('price');
          $data['mi'] = min($a,$b,$c,$d,$e);
          $data['ma'] = max($f,$g,$h,$i,$j);

      return view('front.agency',$data);
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
