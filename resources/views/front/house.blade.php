@extends('layouts.master')
@section('content')
<div class="container mt-3">
    <!-- house -->
      <div class="house">
        <div cass="">
          <div class="mt-3"> <span class="cc ">|</span> <strong class="text-primary">HOUSE</strong></div>
      </div>
           <div class="row">
                <div class="card-deck">

                   @foreach ($home as $h)

                  <div class="col-md-4">
                    
                    <div class="card w-100 cardc">
                        <a href="">
                          <img src="{{ asset($h->photo) }}" alt="" class="w-100 card-img-top">
                          <div class="for" >{{ $h->fname }}</div>
                        </a>
                        <div class="card-body bs pt-3 p-3">
                          <div class="card-text text-white pb-3">
                            <!-- price -->
                            <strong class="red">${{ $h->price }}</strong>
                           <div class="row ">
                              <span class="col-6 pr-1">land Size: {{ $h->lsize }}</span>
                              <span class="col-6 p-0 ">Home Size: {{ $h->hsize }}</span>
                           </div>
                           <div class="row">
                            <span class="col-6 pr-1 ">Type: {{ $h->type }}</span>
                            <span class="col-6 p-0">BedRoom: {{ $h->bedroom }}</span>
                         </div>

                            <span>BathRoom: {{ $h->basroom }}</span><br>
                            <span>Location : {{ $h->location }}</span>
                          </div>
                      </div>
                    </div>
                  </div>


                   @endforeach

                </div>
           </div>
      </div>
</div>
      <!-- endhouse -->
  
@endsection