@extends('layouts.master')
@section('content')
    <!-- apartment -->
 <div class="container">
    <div class="mt-3"> <span class="cc ">|</span> <strong class="text-primary">APARTMENT</strong></div>
     <div class="row">
        @foreach ($apartment as $a)
        <div class="col-sm-4  pl-4 mt-3">
            <a href="#" style="text-decoration: none;">
              <div class="card w-100 pr" >

                  <img class="card-img-top w-100" style="height: 275px" src="{{ asset($a->photo) }}" alt="Aparment Not Founded">
                  <div class="for" >{{ $a->fname }}</div>
                  <div class="card-body">

                    <h5 class="card-title text-primary">$ {{ $a->price }}</h5>
                    <p class="card-text"><i class="fas fa-map-marker-alt"></i> {{ $a->location }}</p>
                    <div class="card-text d-flex justify-content-between">
                       <div class="">SIZE: <span class="text-primary">{{ $a->size }}</span></div>
                       <div class="">BEDROOM: <span class="text-primary">{{ $a->bedroom  }}</span></div>
                    </div>
                    <div class="card-text d-flex justify-content-between">
                      <div class="">BATHROOM: <span class="text-primary">{{ $a->besroom }}</span></div>
                      <div class="">TYPE: <span class="text-primary">{{ $a->floor}}</span></div>

                   </div>

                  </div>
          </div>
        </a>

          </div>
        @endforeach
     </div>
</div>
@endsection