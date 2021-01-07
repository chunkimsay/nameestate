@extends('back.layouts.master')
@section('content')
<form action="{{route('farmland.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
            <button class="btn btn-primary btn-oval "><i class="fa fa-download"></i> Save</button>
            <a href="{{ route('apartment.index') }}" class="btn btn-warning btn-oval "><i class="fa fa-reply-all"></i> Back</a>
            <div class="row">
                <div class="row">
                    <div class="col-sm-10">
                        @component('comp.alert')

                        @endcomponent
                        <hr>
                    </div>
                </div>
            <div class="col-sm-5">


            <div class="form-group row mt-4">
                    <label for="size" class="col-sm-4">Size</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control boxed" name="size" required>
                    </div>
            </div>


             <div class="form-group row">
                <label for="potaintial" class="col-sm-4">Localtion</label>
                <div class="col-sm-8">

                        <select name="location_id" id="" class=" chosen-select form-control boxed">
                            <option value="">Chose Location</option>
                                @foreach ($local as $l)
                                <option value="{{ $l->id }}">{{ $l->name }}</option>
                            @endforeach
                        </select>

                </div>
             </div>
             <div class="form-group row">
                <label for="potaintial" class="col-sm-4">Potaintial</label>
                <div class="col-sm-8">
                    <textarea name="potaintial" id="" cols="30" rows="2" class="form-control boxed" required></textarea>
                </div>
             </div>
             <div class="form-group row">
                <label for="Description" class="col-sm-4">Description</label>
                <div class="col-sm-8">
                    <textarea name="description" id="" cols="30" rows="2" class="form-control boxed" required></textarea>
                </div>
             </div>
             <div class="form-group row">
                <label for="for" class="col-sm-4">Price <span class="text-primary">($)</span></label>
                <div class="col-sm-8">
                  <input type="text" name="price" id="" class="form-control boxed">
                </div>
             </div>
             <div class="form-group row">
                <label for="for" class="col-sm-4">For <span class="text-primary">(rent or sale)</span></label>
                <div class="col-sm-8">
                   <select name="for_id" id="" class="form-control boxed" required>
                            <option value=""></option>
                            @foreach ($for as $f)
                           <option value="{{$f->id}}">{{$f->name}}</option>
                            @endforeach
                   </select>
                </div>
             </div>
          </div>

            <div class="mt-4">
                <input type="file" id="real-file" hidden="hidden"  onchange="preview(event)" name="photo" required>

                <button type="button" id="custom-button" class="btn btn-primary btn-oval "><i class="fa fa-folder-open"></i> Browse</button>
                <span id="custom-text">chose a photo</span>
                <div class="mt-3">
                    <img src="" alt="" width="200" id="img" class="">
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
    $("#farm_menu").addClass('active');
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
