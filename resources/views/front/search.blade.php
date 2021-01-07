@extends('layouts.master')
@section('content')
<div class="search mt-2 pb-4">
    <div class="container">
         <div class="d-flex justify-content-between">
             <div class="mt-2">
                 <span class="cc">|</span> <strong class="text-primary">SEACH YOU PROPERTIES</strong>
             </div>
             <form action="{{route('search.index')}}">
                <div class="btn-group">
                  <button class="btn btn-sm btn-success" id="forrent" name="for" value="FOR SALE">FOR SALE</button>
                  <button class="btn btn-sm btn-primary" id="forsale" name="for" value="FOR RENT">FOR RENT </button>
                </div>
         </div>
         <div class="form-group row mt-3 d-flex justify-content-between">
                 <div class="col">
                     <select name="properties" id="" class="chosen-select boxed  boxed">
                         <option value="condo" class="" {{ @$selected=='condo'?'selected':'' }}>Condo</option>
                         <option value="apartment" class="" {{ @$selected=='apartment'?'selected':'' }}>Apartment</option>
                         <option value="plots" class="" {{ @$selected=='plots'?'selected':'' }}>Plots</option>
                         <option value="home" class="" {{ @$selected=='home'?'selected':'' }}>Home</option>
                         <option value="farmland" class="" {{ @$selected=='farmland'?'selected':'' }}>Farmland</option>
                     </select>
                 </div>
                 <div class="col">
                    <select name="location" id="" class="chosen-select c  boxed">
                        <option value="" class="">Location</option>
                       @foreach ($location as $loc)
                           <option value="{{ $loc->name }}" {{ $loc->name==$locale?'selected':'' }}>{{ $loc->name }}</option>
                       @endforeach
                    </select>
                 </div>
         </div>
         <div class="text-center mb-3">
             <strong>Price : $[ <span id="current-value">{{ $min }}</span>-> <span id="last-value">{{ $max }}</span> ]</strong>
         </div>
         <div class="d-flex justify-content-center ">
             <div class="middle">
                 <div class="multi-range-slider">
                     <input type="range" id="input-left" min="{{ $mi }}" max="{{ $ma }}" value="{{ $min }}" name="min">
                     <input type="range" id="input-right" min="{{ $mi }}" max="{{ $ma }}" name="max" value="{{ $max }}">
                     <div class="slider">
                         <div class="track"></div>
                         <div class="range"></div>
                         <div class="thumb left"  ></div>
                         <div class="thumb right"></div>
                     </div>
                 </div>
             </div>
         </div>
     </form>

    </div>
 </div>
 @if (@$condo)
 <div class="container">
    <div class="mt-3"><span class="cc "></div>
     <div class="row">
        @foreach ($condo as $c)
        <div class="col-sm-4  pl-4 mt-3">
            <a href="#" style="text-decoration: none;">
              <div class="card w-100 pr" >
                  <img class="card-img-top w-100" src="{{ asset($c->bigphoto) }}" alt="land">
                  <div class="for" >{{ $c->fname }}</div>
                  <div class="card-body">
                    <h5 class="card-title text-primary">$ {{ $c->price }}</h5>
                    <p class="card-text"><i class="fas fa-map-marker-alt"></i> {{ $c->location }}</p>
                    <div class="card-text d-flex justify-content-between">
                    </div>
                    <div class="card-text d-flex justify-content-between">
                   </div>
                  </div>
          </div>
        </a>
          </div>
        @endforeach
        @if ($condo=='[]')
            <div class="container text-center ">
                <h2 class="text-muted">No Result........</h2><br>
            </div>
        @endif
     </div>
</div>
@endif
 @if (@$farmland )
 <div class="container">
    <div class="mt-3"> <span class="cc "></div>
     <div class="row">
        @foreach ($farmland as $f)
        <div class="col-sm-4  pl-4 mt-3">
            <a href="#" style="text-decoration: none;">
              <div class="card w-100 pr" >

                  <img class="card-img-top w-100" src="{{ asset($f->photo) }}" alt="land">
                  <div class="for" >{{ $f->fname }}</div>
                  <div class="card-body">
                    <h5 class="card-title text-primary">$ {{ $f->price }}</h5>
                    <p class="card-text m-0"><i class="fas fa-map-marker-alt"></i> {{ $f->location }}</p>
                    <div class="card-text d-flex justify-content-between ">
                        Size : {{ $f->size }}
                    </div>
                    <div class="card-text d-flex justify-content-between">
                        Potaintial :{{ $f->potaintial }}
                   </div>

                  </div>
          </div>
        </a>
          </div>
        @endforeach
        @if ($farmland=='[]')
        <div class="container text-center ">
            <div class="d-flex justify-content-center">
                <img src="{{ asset('images/logo.jpg') }}" alt="" width="77px">
                <h3 class="pl-2 mt-3 text-muted"> No Result...</h3>
            </div>
        </div>
     @endif
     </div>
</div>
 @endif
  @if (@$apartment)
  <div class="container">
    <div class="mt-3"> </div>
     <div class="row">
        @foreach ($apartment as $c)
        <div class="col-sm-4  pl-4 mt-3">
            <a href="#" style="text-decoration: none;">
              <div class="card w-100 pr" >

                  <img class="card-img-top w-100" src="{{ asset($c->photo) }}" alt="land">
                  <div class="for" >{{ $c->fname }}</div>
                  <div class="card-body">

                    <h5 class="card-title text-primary">$ {{ $c->price }}</h5>
                    <p class="card-text mb-0"><i class="fas fa-map-marker-alt"></i> {{ $c->location }}</p>
                    <div class="card-text d-flex justify-content-between">
                        {{ $c->potaintial }}
                    </div>
                    <div class="card-text d-flex justify-content-between">
                   </div>

                  </div>
          </div>
         </a>
          </div>
        @endforeach
        @if ($apartment=='[]')
        <div class="container text-center ">
            <div class="d-flex justify-content-center">
                <img src="{{ asset('images/logo.jpg') }}" alt="" width="77px">
                <h3 class="pl-2 mt-3 text-muted"> No Result...</h3>
            </div>

        </div>
     @endif
     </div>
</div>
 @endif
 @if (@$plots)
  <div class="container">
    <div class="mt-3"> </div>
     <div class="row">
        @foreach ($plots as $c)
        <div class="col-sm-4  pl-4 mt-3">
            <a href="#" style="text-decoration: none;">
              <div class="card w-100 pr" >
                  <img class="card-img-top w-100" src="{{ asset($c->photo) }}" alt="land">
                  <div class="for" >{{ $c->fname }}</div>
                  <div class="card-body">
                    <h5 class="card-title text-primary">$ {{ $c->price }}</h5>
                    <p class="card-text mb-0"><i class="fas fa-map-marker-alt"></i> {{ $c->location }}</p>
                    <div class="card-text d-flex justify-content-between">
                        {{ $c->potaintial }}
                    </div>
                    <div class="card-text d-flex justify-content-between">
                   </div>
                  </div>
          </div>
        </a>

          </div>
        @endforeach
        @if ($plots=='[]')
        <div class="container text-center ">
            <div class="d-flex justify-content-center">
                <img src="{{ asset('images/logo.jpg') }}" alt="" width="77px">
                <h3 class="pl-2 mt-3 text-muted"> No Result...</h3>
            </div>

        </div>
         @endif
     </div>
</div>
 @endif
 @if (@$home)
  <div class="container">
    <div class="mt-3"> </div>
     <div class="row">
        @foreach ($home as $c)
        <div class="col-sm-4  pl-4 mt-3">
            <a href="#" style="text-decoration: none;">
              <div class="card w-100 pr" >

                  <img class="card-img-top w-100" src="{{ asset($c->photo) }}" alt="land">
                  <div class="for" >{{ $c->fname }}</div>
                  <div class="card-body">

                    <h5 class="card-title text-primary">$ {{ $c->price }}</h5>
                    <p class="card-text mb-0"><i class="fas fa-map-marker-alt"></i> {{ $c->location }}</p>
                    <div class="card-text d-flex justify-content-between">
                        {{ $c->potaintial }}
                    </div>
                    <div class="card-text d-flex justify-content-between">


                   </div>

                  </div>
          </div>
        </a>

          </div>
        @endforeach
        @if ($home=='[]')
        <div class="container text-center ">
            <div class="d-flex justify-content-center">
                <img src="{{ asset('images/logo.jpg') }}" alt="" width="77px">
                <h3 class="pl-2 mt-3 text-muted"> No Result...</h3>
            </div>

        </div>
         @endif
     </div>
</div>
 @endif
@endsection
