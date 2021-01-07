<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data['location'] = DB::table('locations')->where('active',1)->get();
        $data['banner'] = DB::table('banner')->join('for','banner.for_id','for.id')
        ->join('locations','banner.location_id','locations.id')
        ->select('banner.*','for.name as fname','locations.name as lname')
        ->where('banner.active',1)
        ->where('locations.active',1)
        ->orderBy('banner.sequence','asc')->get();
        //apartment
        $min = DB::table('banner')->where('active',1)->min('sequence');
        $data['apartment'] = DB::table('apartments')->join('for','apartments.for_id','for.id')
        ->Join('locations','apartments.location_id','locations.id')
        ->select('apartments.*','for.name as fname','locations.name as location')
        ->where('apartments.active',1)
        ->orderBy('apartments.id','desc')
        ->paginate(3);
        //plot
        $data['plot'] = DB::table('plots')
        ->join('for','plots.for_id','for.id')
        ->join('locations','plots.location_id','locations.id')
        ->where('plots.active',1)
        ->where('locations.active',1)
        ->orderBy('plots.id','desc')
        ->select('plots.*','for.name as fname','locations.name as location')

        ->paginate(2);
        //farmland
        $data['farmland'] = DB::table('farmlands')
        ->join('for','farmlands.for_id','for.id')
        ->join('locations','farmlands.location_id','locations.id')
        ->select('farmlands.*','for.name as fname','locations.name as location')
        ->where('farmlands.active',1)
        ->where('locations.active',1)
        ->orderBy('farmlands.id','desc')
        ->paginate(1);
        //condo
        $data['condo'] = DB::table('condo')
        ->join('locations','condo.location_id','locations.id')
        ->select('condo.*','locations.name as location')
        ->where('locations.active',1)
        ->where('condo.active',1)
        ->orderBy('condo.id','desc')
        ->paginate(1);
        $data['photo'] = DB::table('photo')->where('active',1)->get();
        //home
        $data['home'] = DB::table('home')
        ->join('for','home.for_id','for.id')
        ->join('locations','home.location_id','locations.id')
        ->select('home.*','for.name as fname','locations.name as location')
        ->where('home.active',1)
        ->where('locations.active',1)
        ->paginate(3);

        //agency
        $data['agency'] = DB::table('agency')->where('active',1)->paginate(4);
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

      return view('front.index',$data,compact('min'));
    }
}
