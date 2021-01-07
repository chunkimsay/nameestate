<style>
  .condition{
    background-color: black !important;
  }
</style>
@extends('layouts.master')
@section('content')
<div id="carouselExampleControls" class="container carousel slide carousel-fade " data-ride="carousel">
    <div class="carousel-inner">

   @foreach ($banner ?? '' as $b)
   <div class="carousel-item {{ $b->sequence==$min?'active':'' }}">
    <img class="d-block w-100" src="{{ asset($b->photo) }}" alt="First slide">
    <div class="carousel-caption d-none d-md-inline" style="">
            <div class="box  text-dark">
                    <h4 class="text-left">{{ $b->title }}</h4>
                    <div class="d-flex ">
                        <div class="mr-auto p-2"><i class="fa fa-map-marker-alt"></i> {{ $b->lname }}</div>
                        <div class="p-2">SIZE: <span class="text-primary">{{ $b->size }}</span></div>
                        <div class="p-2">BEDROOM: <span class="text-primary">{{ $b->bedroom }}</span></div>
                      </div>
                      <div class="d-flex ">
                        <div class="mr-auto p-2"> </div>
                        <div class="p-2">BATHROOM: <span class="text-primary">{{ $b->bathroom }}</span></div>
                        <div class="p-2">TYPE: <span class="text-primary">E2</span></div>
                      </div>
                      <div class="d-flex">
                        <div class="p-2"><a href="#" class="btn btn-sm btn-success">{{ $b->fname }}</a></div>
                        <div class="p-2 text-primary"><h5 class="red">$ {{ $b->price }}</h5></div>

                      </div>
            </div>

      </div>
      <hr>
  </div>
   @endforeach
    </div>
    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
  <!-- endslide -->
  <!-- search -->
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
                     <select name="properties" id="" class="chosen-select boxed" required>
                         <option value="">Chose Properties</option>
                         <option value="condo" class="">Condo</option>
                         <option value="apartment" class="">Apartment</option>
                         <option value="plots" class="">Plots</option>
                         <option value="farmland" class="">Farmland</option>
                     </select>
                 </div>

                 <div class="col">
                     <select name="location" id="" class="chosen-select boxed">
                         <option value="" class="">Location</option>
                        @foreach ($location as $loc)
                            <option value="{{ $loc->name }}">{{ $loc->name }}</option>
                        @endforeach
                     </select>
                 </div>
         </div>



         <div class="text-center mb-3">
             <strong>start from: $<span id="current-value">{{ $mi }}</span>-> <span id="last-value">${{ $ma }}</span>end</strong>
         </div>
         <div class="d-flex justify-content-center ">

             <div class="middle">
                 <div class="multi-range-slider">
                     <input type="range" id="input-left" min="{{ $mi }}" max="{{ $ma }}" value="{{ $mi }}" name="min">
                     <input type="range" id="input-right" min="{{ $mi }}" max="{{ $ma }}" name="max" value="{{ $ma }}">

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
<!-- end search -->
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

                    <h5 class="card-title text-primary red" >$ {{ $a->price }}</h5>
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
<!-- endapartment -->
   <!-- PLOT -->
   <div class="plot mt-4 ">
    <div class="container">
      <div class="pt-3 mb-3"> <span class="cc ">|</span> <strong class="text-primary">PLOTS</strong></div>
      <div class="card-deck">

        @foreach ($plot as $p)
        <div class="card pb-3">
            <img class="card-img-top w-100" src="{{ asset($p->photo) }}" alt="Card image cap">
            <div class="for" >{{ $p->fname }}</div>
            <div class="card-body pr-4 pl-4 pt-3">
              <h5 class="card-title text-primary red">$ {{ $p->price }}</h5>
              <div class="card-text d-flex justify-content-between">
                <div class="">SIZE: {{ $p->size }}</div>
                <div class="">Location: {{ $p->location }}</div>
             </div>
             <div class="card-text">Potaintial: {{ $p->potaintial }}</div>
            </div>
          </div>
        @endforeach
    </div>



      </div>
    </div>
</div>
<br><br>
<!-- EndPLOT -->
<div class="container" >
    <!-- farmland-->
        @foreach ($farmland as $f)
        <div class="farmland mb-0" style="background-image: url('{{ asset($f->photo) }}'); " >

            <div class="far pl-3 pr-3">
                <div class="farm-l">
                  <div class="d-flex justify-content-center">
                    <h4 class="text-primary">
                      FARMLAND
                      <p style="height: 4px;" class="bg-primary"></p>
                    </h4>

                  </div>
               <div class="text-dark d-flex justify-content-between mb-3 ">
                  <div class="farmt">SIZE: {{ $f->size }}</div>
                  <div class="farmt"><span class="text-primary" >${{ $f->price }}</span></div>
               </div>
               <span class="farmt text-dark mb-3">Location : {{ $f->location }}</span>
               <span class="farmt text-dark mb-3">Potential : {{ $f->potaintial }}</span>
                </div>
            </div> 

            </div>
        @endforeach
     <!-- endfarmland -->
     <!-- condo -->
            @foreach ($condo as $c)
            <a href="{{ url('condo/detail',$c->id) }}">
            <div class=" mt-0" >
                <div class="container-fluid  con">
                    <div cass="">
                        <div class="text-center"><h2 class="text-primary">CONDO</h2></div>
                    </div>
                    <div class="d-flex justify-content-center mb-2">

                      <div class="bg-success" style="width: 120px;height: 8px;"></div>
                    </div>
                    <div class="container">
                        <div class="condoimg">
                            <img src="{{ asset($c->bigphoto) }}" alt="" width="100%">
                            <div class="condodes text-center ">
                                  <h2>{{ $c->name}}</h2>
                                  <h3 class="red">Price($):{{ $c->price }}</h3>
                                  <h3>Location: {{ $c->location }}</h3>
                                  <h3>Potaintial: {{ $c->potaintial }}</h3>
                            </div>

                        </div>

                    </div>

                      {{-- <div class="row mt-4 pb-4 d-flex justify-content-center">
                      @foreach ($photo as $p)
                          @if ($p->condo_id == $c->id)
                            <div class="col-sm-2 mt-2"><img src="{{ asset($p->photo) }}" alt="" class="w-100"></div>
                          @endif
                      @endforeach

                      </div> --}}
                    </a>
                    @endforeach
                </div>
              </div>

      <!-- endcondo -->
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
                            <img src="{{$h->photo}}" alt="" class="w-100 card-img-top">
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
          <!-- endhouse -->
          {{-- Agency --}}
         
      </div></div>
      
@endsection
