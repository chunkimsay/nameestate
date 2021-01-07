<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $q = $request->properties;
        $data['min'] = $request->min;
        $data['max'] = $request->max;
        $data['condo'] = '';
        $data['farmland']='';
        $data['selected'] = $request->properties;
        $data['locale'] = $request->location;
        $a = DB::table('condo')->min('price');
        $s = $request->location;
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
        $data['location'] = DB::table('locations')->where('active',1)->get();
           if($request->properties=='condo')
           {
             $data['condo'] = DB::table('condo')
             ->join('locations','condo.location_id','locations.id')
             ->join('for','condo.for_id','for.id')
             ->select('condo.*','locations.name as location','for.name as fname')
             ->where('condo.active',1)
             ->where('locations.active',1)
             ->where(
                 function($query) use($s,$request) {
                    $query = $query
                    ->where('locations.name','like',"%{$s}%")
                    ->where('for.name',$request->for)
                     ->whereBetween('condo.price',[$request->min,$request->max]);
                 }
                )->get();

             return view('front.search',$data);
           }
         else if($request->properties=='farmland')

         {
            $data['farmland'] = DB::table('farmlands')
            ->join('for','farmlands.for_id','for.id')
            -> join('locations','farmlands.location_id','locations.id')
            ->select('farmlands.*','for.name as fname','locations.name as location')
            ->where('locations.active',1)
            ->where('farmlands.active',1)
            ->where(
                function($query) use($s,$request) {
                   $query = $query->where('locations.name','like',"%{$s}%")
                   ->where('for.name',$request->for)
                   ->whereBetween('farmlands.price',[$request->min,$request->max]);
                }
               )->get();
               return view('front.search',$data);
         }
         elseif($request->properties=='apartment')

         {
            $data['apartment'] = DB::table('apartments')
            ->join('for','apartments.for_id','for.id')
            -> join('locations','apartments.location_id','locations.id')
            ->select('apartments.*','for.name as fname','locations.name as location')
            ->where('locations.active',1)
            ->where('apartments.active',1)
            ->where(
                function($query) use($s,$request) {
                   $query = $query->where('locations.name','like',"%{$s}%")
                   ->where('for.name',$request->for)
                   ->whereBetween('apartments.price',[$request->min,$request->max]);
                }
               )->get();
               return view('front.search',$data);
         }
         elseif($request->properties=='plots')

         {
            $data['plots'] = DB::table('plots')
            ->join('for','plots.for_id','for.id')
            -> join('locations','plots.location_id','locations.id')
            ->select('plots.*','for.name as fname','locations.name as location')
            ->where('locations.active',1)
            ->where('plots.active',1)
            ->where(
                function($query) use($s,$request) {
                   $query = $query->where('locations.name','like',"%{$s}%")
                   ->where('for.name',$request->for)
                   ->whereBetween('plots.price',[$request->min,$request->max]);
                }
               )->get();
               return view('front.search',$data);
         }
         elseif($request->properties=='home')

         {
            $data['home'] = DB::table('home')
            ->join('for','home.for_id','for.id')
            -> join('locations','home.location_id','locations.id')
            ->select('home.*','for.name as fname','locations.name as location')
            ->where('locations.active',1)
            ->where('home.active',1)
            ->where(
                function($query) use($s,$request) {
                   $query = $query->where('locations.name','like',"%{$s}%")
                   ->where('for.name',$request->for)
                   ->whereBetween('home.price',[$request->min,$request->max]);
                }
               )->get();
               return view('front.search',$data);
         }
         else
         {
             echo 'hello';
         }
    }

}
