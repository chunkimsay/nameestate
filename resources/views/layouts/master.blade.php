<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('fontawesome/css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{asset('backend/css/component-chosen.css')}}">
    <style>
        .loader {
  border: 16px solid #f3f3f3; /* Light grey */
  border-top: 16px solid #3498db; /* Blue */
  border-radius: 50%;
  width: 120px;
  height: 120px;
  animation: spin 2s linear infinite;
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}
    </style>
    <title>Real Estate Cambodia</title>
</head>
<body>
  
    @php

    $company = DB::table('company')->get();

    @endphp
    <!-- info -->
         @foreach ($company as $com)
         <div class="container-fluid nav-foot">
         <div class="container mt-3 mb-0">
            <div class=" d-flex justify-content-between" >
                <div class="logo" >
                    <a href="/"><img src="{{ asset('images/logo.png') }}" alt="ok" width="80px" style=""></a>
                </div>
                <div class="mail" >
                    <a href="mailto:{{ $com->email }}"><i class="fa fa-envelope"></i></a>
                    <span class="d-none d-sm-inline">{{ $com->email }}</span>
                </div>
                <div class="phone">
                    <a href="tel:+855 {{ $com->phone }}"><i class="fa fa-phone"></i></a>
                    <span class=" d-sm-inline">{{ $com->phone }}</span>
                </div>
                <div class="chat">
                    <a href="#" class="btn btn-sm btn-success">Chat With Us</a>
                </div>
            </div>

         </div>
        </div>
        {{-- <div class="line w-100 bg-secondary mt-3" style="height: 2px;opacity: 70%;"></div> --}}

         @endforeach

    <!-- endinfo -->
   <!-- navbar fixed-top-->
        
        <div class="container-fluid">
          <nav class="navbar navbar-expand-lg navbar-light" style="background-color:rgb(0, 0, 48)" >
            <a class="navbar-brand" href="{{ url('/') }}"><i class="" aria-hidden="true"></i></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class=" collapse navbar-collapse" id="navbarNavAltMarkup"> --}}
              
                <ul class="navbar-nav">
                  {{-- <li class="nav-item">
                    <a class="nav-item nav-link active" href="{{ url('/') }}"><span class="sr-only">(current)</span></a>
                  </li> --}}
                  <li class="nav-item">
                    <a href="/" class="nav-link fa fa-home {{'/'== request()->path() ? 'active1' : ''}}"">
                      {{-- <i class="fa fa-home" aria-hidden="true"></i> --}}
                    </a>
                    
                  </li>
                
                  <li class="nav-item">
                    <a class="nav-link  {{ Request::is('condo') ? 'active1' : '' }} {{ Request::is('condo/*') ? 'active1' : '' }}" href="/condo">CONDO</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link {{ Request::is('house') ? 'active1' : '' }} {{ Request::is('house/*') ? 'active1' : '' }}"  href="/house">HOUSE</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link {{ Request::is('plot') ? 'active1' : '' }} {{ Request::is('plot/*') ? 'active1' : '' }}" href="/plot">PLAND</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link {{ Request::is('apartment') ? 'active1' : '' }} {{ Request::is('apartment/*') ? 'active1' : '' }}" href="/apartment">APARTMENT</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link {{ Request::is('agency') ? 'active1' : '' }} {{ Request::is('agency/*') ? 'active1' : '' }}" href="/agency">AGENCY</a>
                  </li>
                </ul>
                
                
                <div class="dropdown navbar-nav">
                  <a class="nav-link nav-item pointer dropdown-toggle {{ Request::is('farmland') ? 'active1' : '' }} {{ Request::is('farmland/*') ? 'active1' : '' }}" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    More
                  </a>
                  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="/farmland">Farmland</a>
                    <a class="dropdown-item" href="#"></a>
                    <a class="dropdown-item" href="#"></a>
                  </div>
                </div>

                
              
            </div> 
            
            
            <a class="nav-item nav-link bold {{ Request::is('about-us') ? 'active1' : '' }} {{ Request::is('about-us/*') ? 'active1' : '' }} " href="/about-us">ABOUT US</a>
      
                    
          </nav>
        </div>
          <div class="line w-100 bg-secondary mt-3" style="height: 2px;opacity: 70%;"></div>
        </div>
     </div>
     <div id="fb-root"></div>
        <!-- Your Chat Plugin code -->
      <div class="fb-customerchat"
      attribution=setup_tool
      page_id="103845804909181"
      theme_color="#000030"
      logged_in_greeting="Hi! How can we help you? Do you interest with which real estate"
      logged_out_greeting="Hi! How can we help you? Do you interest with which real estate">
    </div>
        <br>
          <!-- endnavbar -->
          <!-- slide -->
            @yield('content')









             <!-- footer -->
           @foreach ($company as $com)
          
          
           <div class="container-fluid	 footer mt-2 nav-foot" >
            <div class="line w-100 bg-secondary mt-3" style="height: 2px;opacity: 70%;"></div>

            <div class="container">
            <div class="d-flex justify-content-between">
              <div class="">
                <p class="contact-email">Email: {{ $com->email }}</p>
                <p class="contact-tel">Phone: {{ $com->phone }}</p>
                <p class="adress">Address: {{ $com->address}}</p>
              </div>
              <div class="">
                <p class="working-time mt-5">Working {{ $com->workingday }} {{ $com->workinghour }}</p>
              </div>
              <div class="mt-5">
                <p>&copy;2020 Slay Tech Company</p>
              </div>
            </div>
          </div>
           </div>
           @endforeach
        
          
     


   <!-- js -->
<script>$('.navbar-nav .nav-link').click(function(){
  $('.navbar-nav .nav-link').removeClass('active');
  $(this).addClass('active');
})</script>
<script src="{{ asset('js/style.js') }}"></script>
<script src="{{ asset('backend/js/vendor.js') }}"></script>
<script src="{{ asset('backend/js/app.js') }}"></script>
<script src="{{ asset('backend/js/chosen.jquery.min.js') }}"></script>
     <script>
            $(".chosen-select").chosen();
  </script>
  <script>
    window.fbAsyncInit = function() {
      FB.init({
        xfbml            : true,
        version          : 'v9.0'
      });
    };

    (function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));</script>
        @yield('js')
</body>
</html>
