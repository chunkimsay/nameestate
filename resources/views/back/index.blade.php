@extends('back.layouts.master')
@section('content')
@php
   $total = DB::table('users')->count();
   $tcondo = DB::table('condo')->where('active',1)->count();
   $tapartment = DB::table('apartments')->where('active',1)->count();
   $thome = DB::table('home')->where('active',1)->count();
   $tplot = DB::table('plots')->where('active',1)->count();
   $tfarmland = DB::table('farmlands')->where('active',1)->count();
   
@endphp
  <h1 class="text-success">Dashboard</h1>
  <div class="row sameheight-container">

    <div class="col-sm-6  stats-col">
        <hr>
        <div class="card sameheight-item stats" data-exclude="xs">
            <div class="card-block">
                <div class="title-block">
                    <h4 class="title">  <i class="fa fa-bar-chart-o"></i> Information </h4>

                    </p>
                </div>
                <div class="row row-sm stats-container">
                    <div class=" col-sm-6 stat-col" >
                        <div class="stat-icon" >
                            <a href="{{route('user.index')}}">
                            <i class="fa fa-users"></i></a>
                        </div>
                        <div class="stat">
                            <div class="value"> {{ $total }} </div>
                            <div class="name"> Total Users </div>
                        </div>
                        <div class="progress stat-progress">
                            <div class="progress-bar" style="width: 75%;"></div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 stat-col">
                        <div class="stat-icon">
                            <a href="{{route('condo.index')}}">
                            <i class="fa fa-home"></i></a>
                        </div>
                        <div class="stat">
                            <div class="value">{{ $tcondo }} </div>
                            <div class="name"> Total Condo </div>
                        </div>
                        <div class="progress stat-progress">
                            <div class="progress-bar" style="width: 25%;"></div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6  stat-col">
                        <div class="stat-icon">
                            <a href="{{route('apartment.index')}}">
                            <i class="fa fa-home"></i></a>
                        </div>
                        <div class="stat">
                            <div class="value"> {{ $tapartment }}</div>
                            <div class="name">Total Apartment</div>
                        </div>
                        <div class="progress stat-progress">
                            <div class="progress-bar" style="width: 60%;"></div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6  stat-col">
                        <div class="stat-icon">
                            <a href="{{ route('plot.index') }}">
                            <i class="fa fa-home"></i></a>
                        </div>
                        <div class="stat">
                            <div class="value"> {{ $tplot }} </div>
                            <div class="name"> Total Plots </div>
                        </div>
                        <div class="progress stat-progress">
                            <div class="progress-bar" style="width: 34%;"></div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6  stat-col">
                        <div class="stat-icon">
                            <a href="{{ route('farmland.index') }}">
                            <i class="fa fa-home"></i></a>
                        </div>
                        <div class="stat">
                            <div class="value">{{ $tfarmland }}</div>
                            <div class="name">Total Farmlands</div>
                        </div>
                        <div class="progress stat-progress">
                            <div class="progress-bar" style="width: 49%;"></div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 stat-col">
                        <div class="stat-icon">

                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
@section('js')
<script>
    $(document).ready(function(){
    $("#slidebar-menu li").removeClass('active open');
    $("#slidebar-menu li  ul li").removeClass('active');

    $("#dash_menu").addClass('active');
    });
</script>
@endsection
