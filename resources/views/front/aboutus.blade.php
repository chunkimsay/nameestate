@extends('layouts.master')
@section('content')
<style>
    .address-icon i{
	font-size: 36px;
	line-height: 32px;
}
.icons i{
	color: #fff;
	padding: 8px 0px;
	text-align: center;
	height: 30px;
	width: 30px;
	margin-right: 5px;
}
.fa-facebook{
	background-color: #3A5A99; 
}
.fa-twitter{
	background-color: #39CBFA;
}
.fa-linkedin{
	background-color: #3D99C0;
}
.fa-github{
	background-color: #000;
}
</style>
@foreach ($company as $com)

<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="row">
                <div class="col-lg-12 col-12 p-0 contact-us">
                  <h4 class="">CONTACT US</h4><hr>
                </div>
            </div>
            <div class="row bg-light pt-3 pb-3 mb-4"​​​ style="background-color: rgb(0, 0, 48) !important; color:white">
                <div class="col-lg-12">
                  <h6>ADDRESS :</h6>
                </div>
                <div class="col-lg-4 col-4">
                    {{ $com->address}}                          
                </div>
                <div class="col-lg-4 col-4">
                <p class="m-0 text-danger"><i class="fa fa-phone-square" aria-hidden="true"></i>
                    {{ $com->phone }}
                </p>
                <p class="m-0 text-info"><i class="fa fa-envelope" aria-hidden="true"></i>
                    {{ $com->email }}
                </p>
                </div>
                <div class="col-lg-4 col-4 address-icon text-center text-danger">
                    <i class="fa fa-map-marker" aria-hidden="true"></i>
                </div>
            </div>
            {{--  --}}
            <div class="col-lg-12 col-md-12">
                <div style="width: 100%">    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3908.8266760493843!2d104.91155236222951!3d11.56427988357027!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31095114f1138ac5%3A0x7619b468836cd886!2sPhnom%20Penh%20International%20University!5e0!3m2!1sen!2skh!4v1606633912256!5m2!1sen!2skh" width="100%" height="450" frameborder="0" style="border:1;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                </div>
                <div class="icons">
                    <a href=""><i class="fa fa-facebook"></i></a>
                    <a href=""><i class="fa fa-twitter"></i></a>
                    <a href=""><i class="fa fa-linkedin"></i></a>
                    <a href=""><i class="fa fa-github"></i></a>
                </div>
            </div>
            
        </div>
    </div>
  </div>

@endforeach
@endsection
@section('js')
<script>
$(document).ready(function(){
$("#slidebar-menu li").removeClass('active open');
$("#slidebar-menu li  ul li").removeClass('active');

$("#menu_company").addClass('active');
});
</script>
@endsection