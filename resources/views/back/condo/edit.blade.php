
@extends('back.layouts.master')
@section('header')
<strong>Edit Condo</strong>
@endsection
@section('content')
<form action="{{route('condo.update',$condo->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
     @method('PATCH')
            <button class="btn btn-primary btn-oval "><i class="fa fa-download"></i> Save</button>
            <a href="{{ route('condo.index') }}" class="btn btn-warning btn-oval "><i class="fa fa-reply-all"></i> Back</a>
            <div class="row">
                <div class="col-sm-5">
                    @component('comp.alert')

                    @endcomponent
                    <hr>
                </div>
            </div>
            <div class="row">

            <div class="col-sm-5">


            <div class="form-group row mt-4">
                    <label for="size" class="col-sm-4">Name</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control boxed" name="name" required autofocus value="{{ $condo->name }}" >
                    </div>
            </div>
            <div class="form-group row mt-4">
                <label for="floor" class="col-sm-4">Location</label>
                <div class="col-sm-8">

                        <select name="location_id" id="" class=" chosen-select form-control boxed">
                            <option value="">Chose Location</option>
                                @foreach ($local as $l)
                                <option value="{{ $l->id }}" {{ $condo->location_id==$l->id?'selected':'' }}>{{ $l->name }}</option>
                            @endforeach
                        </select>

                </div>
             </div>
             <div class="form-group row mt-4">
                <label for="bedroom" class="col-sm-4">Potaintial</label>
                <div class="col-sm-8">
                   <textarea name="potaintial" id="" cols="30" rows="2" class="form-control boxed">{{ $condo->potaintial }}</textarea>
                </div>
             </div>
             <div class="form-group row mt-4">
                <label for="bedroom" class="col-sm-4">Description</label>
                <div class="col-sm-8">
                   <textarea name="description" id="" cols="30" rows="2" class="form-control boxed">{{ $condo->description }}</textarea>
                </div>
             </div>

             <div class="form-group row mt-4">
                <label for="bedroom" class="col-sm-4">Price</label>
                <div class="col-sm-8">
                 <input type="text" name="price" class="form-control boxed" id="" value="{{ $condo->price }}">
                </div>
             </div>
             <div class="form-group row">
                <label for="for" class="col-sm-4">For <span class="text-primary">(rent or sale)</span></label>
                <div class="col-sm-8">
                   <select name="for_id" id="" class="form-control boxed">
                            <option value=""></option>
                            @foreach ($for as $f)
                           <option value="{{$f->id}}" {{$condo->for_id == $f->id?'selected':''}}>{{$f->name}}</option>
                            @endforeach
                   </select>
                </div>
             </div>




          </div>
          <div class="col-sm-1"></div>
          <div class="col-sm-5 mt-4">
            <div class="">
                <input type="file" id="real-file" hidden="hidden"  onchange="preview(event)" name="bigphoto" >

                <button type="button" id="custom-button" class="btn btn-primary btn-oval "><i class="fa fa-folder-open"></i> Browse</button>
                <span id="custom-text">chose a thumnail</span>
                <div class="">
                    <img src="{{ asset($condo->bigphoto) }}" alt="" width="200" id="img" class="mt-2">
                </div>
            </div>
            <div class="mt-5">
                <div class="form-group">
                    <input type="file" id="real-files" hidden="hidden"  onchange="pview(event)" name="photo[]"  multiple>

                    <a type="buttons" id="custom-buttons" class="btn btn-warning btn-oval "><i class="fa fa-folder-open"></i> Browse</a>
                    <span id="custom-texts">chose 6 photo</span>
                    {{-- <div id="photos" class="mr-2"></div> --}}
                </div>
                <div class="" id="photos">
                    @foreach ($photo as $ph)
                        <img src="{{ asset($ph->photo) }}" alt="" height="150px">
                    @endforeach
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
    $("#condo_menu").addClass('active');
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
     <script>
        const realFileBtns = document.getElementById("real-files");
        const customBtns = document.getElementById("custom-buttons");
        const customTxts = document.getElementById("custom-texts");

        customBtns.addEventListener("click", function() {
        realFileBtns.click();
        });

        realFileBtns.addEventListener("change", function() {
        if (realFileBtns.value) {
            customTxts.innerHTML =realFileBtns.value.match(

            )
        } else {
            customTxts.innerHTML = "No file chosen, yet.";
        }
        });
    </script>
     <script>
        function pview(ev)
        {

            let photos = ev.target.files;
            let im = "";
            for(let i=0;i<photos.length; i++)
            {
                let sr = URL.createObjectURL(ev.target.files[i]);
                im += "<img src='"+ sr +"'height='100' class='ml-2'>"
            }
            document.getElementById('photos').innerHTML =im;
        }
    </script>



@endsection
