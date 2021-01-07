@extends('back.layouts.master')
@section('content')
<form action="{{route('apartment.update',$apart->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
            <button class="btn btn-primary btn-oval "><i class="fa fa-download"></i> Save</button>
            <a href="{{ route('apartment.index') }}" class="btn btn-warning btn-oval "><i class="fa fa-reply-all"></i> Back</a>
            <div class="row">
                @component('comp.alert')

                @endcomponent
                <div class="row">
                    <div class="col-sm-10">

                        <hr>
                    </div>
                </div>
            <div class="col-sm-5">


            <div class="form-group row mt-4">
                    <label for="size" class="col-sm-4">Size</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control boxed" name="size" required value="{{ $apart->size }}">
                    </div>
            </div>
            <div class="form-group row mt-4">
                <label for="floor" class="col-sm-4">Floor</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control boxed" name="floor"  required value="{{ $apart->size }}">
                </div>
             </div>
             <div class="form-group row mt-4">
                <label for="bedroom" class="col-sm-4">Bedroom</label>
                <div class="col-sm-8">
                    <input type="number" class="form-control boxed" name="bedroom" required value="{{ $apart->bedroom }}" min="1">
                </div>
             </div>
            <div class="form-group row">
                <label for="Location" class="col-sm-4">Basroom</label>
                <div class="col-sm-8">
                    <input type="number" class="form-control boxed" name ='besroom' required min="1" value="{{ $apart->besroom }}">
                </div>
            </div>

            <div class="form-group row">
                <label for="Location" class="col-sm-4">Price <span class="text-primary"> (<i class="fa fa-dollar"></i>)</span></label>
                <div class="col-sm-8">
                    <input type="text" class="form-control boxed" name ='price' required value="{{ $apart->price }}">
                </div>
            </div>
            <div class="form-group row">
                <label for="freespace" class="col-sm-4">Free Space</label>
                <div class="col-sm-8">
                  <input type="text" name="freespace" id="" class="form-control boxed" value="{{ $apart->freespace }}">
                </div>
             </div>


          </div>
          <div class="col-sm-5 mt-4">
            <div class="form-group row">
                <label for="potaintial" class="col-sm-4">Location</label>
                <div class="col-sm-8">
                    <select name="location_id" id="" class="form-control boxed chosen-select" required>
                        <option value="">Chose Location</option>
                            @foreach ($local as $l)
                            <option value="{{ $l->id }}" {{ $l->id==$apart->location_id?'selected':'' }}>{{ $l->name }}</option>
                        @endforeach
                    </select>
                </div>
             </div>
              <div class="form-group row">
                 <label for="potaintial" class="col-sm-4">Potaintial</label>
                 <div class="col-sm-8">
                     <textarea name="potaintial" id="" cols="30" rows="2" class="form-control boxed">{{ $apart->potaintial }}</textarea>
                 </div>
              </div>

              <div class="form-group row">
                <label for="Description" class="col-sm-4">Description</label>
                <div class="col-sm-8">
                    <textarea name="description" id="" cols="30" rows="2" class="form-control boxed">{{ $apart->description }}</textarea>
                </div>
             </div>
             <div class="form-group row">
                <label for="for" class="col-sm-4">For <span class="text-primary">(rent or sale)</span></label>
                <div class="col-sm-8">
                   <select name="for_id" id="" class="form-control boxed">
                            <option value=""></option>
                            @foreach ($for as $f)
                           <option value="{{$f->id}}" {{$apart->for_id == $f->id?'selected':''}}>{{$f->name}}</option>
                            @endforeach
                   </select>
                </div>
             </div>

          </div>
          <div class="col-sm-2">
            <div class="mt-4">
                <input type="file" id="real-file" hidden="hidden"  onchange="preview(event)" name="photo" >

                <button type="button" id="custom-button" class="btn btn-primary btn-oval "><i class="fa fa-folder-open"></i> Browse</button>
                <span id="custom-text">chose a photo</span>
                <img src="{{ asset($apart->photo) }}" alt="" width="200" id="img" class="mt-2">
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

    $("#menu_post").addClass('active');
    $("#collapse_post").addClass('collapse  in');
    $("#apart_menu").addClass('active');
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
