@extends('layouts.master')
@section('content')
        <div class="container">
        <div class=" plot mt-4 col-md-10">
          <div class="container">
            <div class="pt-3 mb-3"> <span class="cc ">|</span> <strong class="text-primary">Farmland</strong></div>
            <hr>
            <div class="card-deck">
              
              @foreach ($farmland as $f)
              <div class="card pb-4">
                  <img class="card-img-top" src="{{ asset($f->photo) }}" alt="Card image cap">
                  <div class="for" >{{ $f->fname }}</div>
                  <div class="card-body pr-4 pl-4 pt-4">
                    <h5 class="card-title text-primary">$ {{ $f->price }}</h5>
                    <div class="card-text d-flex justify-content-between">
                      <div class="">SIZE: {{ $f->price}}</div>
                      <div class="">Location: {{ $f->location }}</div>
                   </div>
                   <div class="card-text">Potaintial: {{ $f->potaintial }}</div>
                  </div>
                </div>
                
          </div>
          <br><br>
          @endforeach
      
      
      
            </div>
          </div>
        </div>
      

    
@endsection
 <!-- endfarmland -->