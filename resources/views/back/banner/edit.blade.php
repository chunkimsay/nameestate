@extends('back.layouts.master')
@section('content')
<form action="{{route('banner.update',$banner->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
            <button class="btn btn-primary btn-oval "><i class="fa fa-download"></i> Save</button>
            <a href="{{ route('banner.index')}}" class="btn btn-warning btn-oval "><i class="fa fa-reply-all"></i> Back</a>

            <div class="row">
            <div class="row">
                <div class="col-sm-10">
                    @component('comp.alert')

                    @endcomponent
                </div>
            </div>
            <div class="col-sm-5">
                <hr>
            <div class="form-group row mt-4">
                    <label for="title" class="col-sm-4">Title</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control boxed" name="title" required value="{{$banner->title}}" autofocus>
                    </div>
            </div>
            <div class="form-group row">
                <label for="Location" class="col-sm-4">Location</label>
                <div class="col-sm-8">
                    <select name="location_id" id="" class="form-control boxed">
                        @foreach ($local as $l)
                        <option value="{{ $l->id }}" {{ $l->id==$banner->location_id?'selected':'' }}>{{ $l->name }}</option>
                    @endforeach
                </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="Location" class="col-sm-4">Size</label>
                <div class="col-sm-8">
                    <input type="text" name="size" id="" class="form-control boxed" value="{{ $banner->size }}">
                </div>
            </div>
            <div class="form-group row">
                <label for="Location" class="col-sm-4">BedRoom</label>
                <div class="col-sm-8">
                    <input type="number" name="bedroom" id="" min="1" class="form-control boxed" value="{{ $banner->bedroom }}">
                </div>
            </div>
            <div class="form-group row">
                <label for="type" class="col-sm-4">Bathroom</label>
                <div class="col-sm-8">
                    <input type="number" name="bathroom" id="" class="form-control boxed" min="1" value="{{ $banner->bathroom }}">
                </div>
            </div>
            <div class="form-group row">
                <label for="type" class="col-sm-4">Type</label>
                <div class="col-sm-8">
                    <input type="text" name="type" id="" class="form-control boxed"  value="{{ $banner->type }}">
                </div>
            </div>
            <div class="form-group row">
                <label for="type" class="col-sm-4">sequence</label>
                <div class="col-sm-8">
                    <input type="number" name="sequence" id="" class="form-control boxed"  value="{{ $banner->sequence }}">
                </div>
            </div>


          </div>
          <div class="col-sm-5 mt-4">
            <div class="form-group row mt-3">

                <label for="For" class="col-sm-4">For <span class="text-primary" >(sale or rent)</span></label>
                <div class="col-sm-8">
                  <select name="for_id" id="" class="form-control boxed" required>


                      @foreach ($for as $f)
                        <option value="{{ $f->id }}" {{ $banner->for_id==$f->id?'selected':'' }}>{{ $f->name }}</option>
                      @endforeach
                  </select>
                </div>
            </div>
            <div class="form-group row ">
                <label for="For" class="col-sm-4">Price<span class="text-primary" >($)</span></label>
                <div class="col-sm-8">
                  <input type="text" name="price" id="" class="form-control boxed" value="{{ $banner->price }}">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-4"></div>
                <div class="col-sm-8">
                    <input type="file" id="real-file" hidden="hidden"  onchange="preview(event)" name="photo" >

                    <button type="button" id="custom-button" class="btn btn-primary btn-oval "><i class="fa fa-folder-open"></i> Browse</button>
                    <span id="custom-text">chose a photo</span>

                    <div class="mt-3">

                        <img src="{{ asset($banner->photo) }}" alt="" width="150" id="img">
                    </div>
                </div>
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

    $("#menu_banner").addClass('active');
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
