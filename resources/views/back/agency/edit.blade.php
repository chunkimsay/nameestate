@extends('back.layouts.master')
@section('content')
<form action="{{route('agency.update',$agen->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
            <button class="btn btn-primary btn-oval "><i class="fa fa-download"></i> Save</button>
            <a href="{{ route('agency.index') }}" class="btn btn-warning btn-oval "><i class="fa fa-reply-all"></i> Back</a>
            <div class="row">
                <div class="col-sm-5">
                    @component('comp.alert')

                    @endcomponent
                </div>
            </div>
            <div class="row">
            <div class="col-sm-5">
                <hr>
            <div class="form-group row mt-4">
                    <label for="name" class="col-sm-4">Name</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control boxed" name="name" required value="{{ $agen->name }}" >
                    </div>
            </div>
            <div class="form-group row">
                <label for="position" class="col-sm-4">Position</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control boxed" name ='position' placeholder="position" value="{{ $agen->position }}">
                </div>
            </div>
            <div class="form-group row">
                <label for="email" class="col-sm-4">Email</label>
                <div class="col-sm-8">
                    <input type="email" name="email" id="" class="form-control boxed" placeholder="email" value='{{ $agen->email }}'>
                </div>
            </div>
            <div class="form-group row">
                <label for="Location" class="col-sm-4">Phone</label>
                <div class="col-sm-8">
                    <input type="text" name="phone" id=""  class="form-control boxed" required placeholder="phone" value="{{ $agen->phone }}">
                </div>
            </div>
            <div class="form-group row">
                <label for="type" class="col-sm-4">Description</label>
                <div class="col-sm-8">
                   <textarea name="description" id="" cols="30" rows="2" class="form-control boxed">{{ $agen->description }}</textarea>
                </div>
            </div>



          </div>
          <div class="col-sm-5 mt-4">
            <div class="form-group row">

            </div>
            <input type="file" id="real-file" hidden="hidden"  onchange="preview(event)" name="photo" >

            <span type="button" id="custom-button" class="btn btn-info btn-oval"><i class="fa fa-cloud-download" style="font-size: 20px"></i> Browse</span>
            <span id="custom-text">chose a photo</span>

            <div class="mt-3">
                <img src="{{ asset($agen->photo) }}" alt="" width="150" id="img">
            </div>
          </div>
      </div>
    </form>
@endsection
@section('js')
<script>

    function preview(evt)
       {
           let img = document.getElementById('img');
           img.src = URL.createObjectURL(evt.target.files[0]);
       }
       $(document).ready(function(){
    $("#slidebar-menu li").removeClass('active open');
    $("#slidebar-menu li  ul li").removeClass('active');

    $("#menu_agency").addClass('active');
    });
</script>
    <script>
        const realFileBtn = document.getElementById("real-file");
        const customBtn = document.getElementById("custom-button");
        const customTxt = document.getElementById("custom-text");

        customBtn.addEventListener("click", function() {
        realFileBtn.click();
        });

        realFileBtn.addEventListener("change", function() {
        if (realFileBtn.value) {
            customTxt.innerHTML = realFileBtn.value.match(
            /[\/\\]([\w\d\s\.\-\(\)]+)$/
            )[1];
        } else {
            customTxt.innerHTML = "No file chosen, yet.";
        }
        });
    </script>

@endsection
