@extends('layouts.master')
@section('content')
   <!-- PLOT -->
   <div class="plot mt-4 ">
    <div class="container">
      <div class="pt-3 mb-3"> <span class="cc ">|</span> <strong class="text-primary">PLOTS</strong></div>
      <div class="card-deck">

        @foreach ($plot as $p)
        <div class="card pb-3">
          <a href="{{ url('/plot/detail',$p->id) }}">
            <img class="card-img-top w-100" src="{{ asset($p->photo) }}" alt="Card image cap">
            <div class="for" >{{ $p->fname }}</div>
            <div class="card-body pr-4 pl-4 pt-3">
              <h5 class="card-title text-primary">$ {{ $p->price }}</h5>
              <div class="card-text d-flex justify-content-between">
                <div class="">SIZE: {{ $p->size }}</div>
                <div class="">Location: {{ $p->location }}</div>
             </div>
             <div class="card-text">Potaintial: {{ $p->potaintial }}</div>
            </div>
          </div>
        </a>
        @endforeach
    </div>



      </div>
    </div>
@endsection

