@extends('layouts.master')
@section('content')
    

{{-- Agency --}}
<div class="container"> 
<div class="agency mt-4">
    {{-- <div class="container-fluid "> --}}
         <div class="card-deck ">
                <div class="row">
                @foreach ($agency as $ag)
                <div class="col-md-3" style="">
                    <div class="card">
                        <img src="{{ asset($ag->photo) }}" alt="" class="card-img-top" style="border: 3px solid rgb(80, 80, 218);">
                        <div class="card-body text-center mt-3">
                            <h5 class="text-primary">{{ $ag->name }}</h5>
                            <h5 class="mb-3">{{ $ag->position }}</h5>

                            <h5 class="">Welcome to personal Statement!</h5>
                            <h5 class="mb-4">{{ $ag->description }}</h5>
                            <a href=""><h5 class="text-primary">View Profile</h5></a>

                        </div>
                      </div>
                </div>
                @endforeach
            </div>
            {{-- <div class="line w-100 bg-secondary mt-3" style="height: 2px;opacity: 70%;"></div> --}}
         {{-- </div> --}}
  {{-- EndAgency --}}
</div>
</div></div>
  @endsection