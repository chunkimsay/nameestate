@extends('layouts.master')
@section('content')
<head>
    <title>Condo</title>
</head>
    <!-- condo -->
    @foreach ($condo as $c)
    <a href="{{ url('condo/detail',$c->id) }}">
    <div class=" mt-0" >
        <div class="container-fluid  con">
            <div class="">

                <div class="text-center"><h2 class="text-primary">{{ $c->name}}</h2></div>
            
            </div>
            <div class="d-flex justify-content-center mb-2">

              <div class="bg-success" style="width: 200px;height: 8px;"></div>
            </div>
            <div class="container">
                <div class="condoimg">
                    <img src="{{ asset($c->bigphoto) }}" alt="" width="100%">
                    <div class="condodes text-center ">
                          <h2>{{ $c->name}}</h2>
                          <h3>Price($):{{ $c->price }}</h3>
                          <h3>Location: {{ $c->location }}</h3>
                          <h3>Potaintial: {{ $c->potaintial }}</h3>
                    </div>

                </div>

            </div>

            {{-- <div class="container row mt-4 pb-4 d-flex justify-content-center">
             @foreach ($photo as $p)
                @if ($p->condo_id == $c->id)
                  <div class="col-sm-2 mt-2"><img src="{{ asset($p->photo) }}" alt="" class="w-100"></div>
                @endif
             @endforeach

            </div> --}}
            <hr>
        </a>
            @endforeach
        </div>
      </div>


@endsection