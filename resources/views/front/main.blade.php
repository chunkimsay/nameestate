<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="fontawesome/css/all.min.css">
    <link rel="stylesheet" href="fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="css/style.css">
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
         <div class="container-fluid" style="background-color:rgb(253, 84, 84)">
         <div class="container mt-3 mb-0">
            <div class=" d-flex justify-content-between" >
                <div class="logo" >
                    <a href="/"><img src="images/logo.png" alt="ok" width="80px" style=""></a>
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
        <div class="container-fluid " style="background-color: rgb(75, 75, 75); ">
          <div class="container">
          <nav class="navbar navbar-expand-lg navbar-light " style="">

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span> MENU
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav d-flex justify-content-between w-100">
                <li class="nav-item active">
                  <a class="nav-link" href="{{ url('/') }}">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">FLATHOUSE</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="plot">PLOT</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="farmland">FARMLAND</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="condo">CONDO</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="agency">AGENCY</a>
                  </li>
                  <li class="nav-item">
                    <div class="dropdown">
                      <a class="nav-link pointer dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        More
                      </a>
                      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="apartment">Apartment</a>
                        <a class="dropdown-item" href="#"></a>
                        <a class="dropdown-item" href="#"></a>
                      </div>
                    </div>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="about-us">ABOUT</a>
                  </li>

              </ul>
          </nav>
        </div>
          <div class="line w-100 bg-secondary mt-3" style="height: 2px;opacity: 70%;"></div>
        </div>
     </div>
        
        <br>
          <!-- endnavbar -->
          <!-- slide -->
            @yield('content')









             <!-- footer -->
           @foreach ($company as $com)
          <div class="container-fluid	">
            <div class="line w-100 bg-secondary mt-3" style="height: 2px;opacity: 70%;"></div>
          
           <div class="footer mt-2 " style="background-color: rgb(253, 84, 84)">
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
        </div>
          
     


   <!-- js -->

<script src="{{ asset('js/style.js') }}"></script>
<script src="{{ asset('backend/js/vendor.js') }}"></script>
<script src="{{ asset('backend/js/app.js') }}"></script>
<script src="{{ asset('backend/js/chosen.jquery.min.js') }}"></script>
     <script>
            $(".chosen-select").chosen();
  </script>
        @yield('js')
</body>
</html>
