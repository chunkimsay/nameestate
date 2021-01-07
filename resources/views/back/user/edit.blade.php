@extends('back.layouts.master')
@section('content')
<form action="{{route('user.update',$user->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group row">
                    <button class=" btn btn-sm btn-oval btn-primary mr-2"><i class="fa fa-save"></i> Save</button>
                     <a href="#" class="btn btn-sm btn-warning btn-oval"><i class="fa fa-undo"></i> Back</a>
                </div>
                <div class="form-group row">
                    <label for="name" class="col-sm-3">Name <span class="text-danger">*</span></label>
                    <div class="col-sm-9">
                    <input type="text" name="name" id="name" class="form-control boxed" autofocus required value="{{$user->name}}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="username" class="col-sm-3">Username<span class="text-danger">*</span></label>
                    <div class="col-sm-9">
                        <input type="text" name="username" id="username" class="form-control boxed" required value="{{$user->username}}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="email" class="col-sm-3">Email<span class="text-danger">*</span></label>
                    <div class="col-sm-9">
                        <input type="email" name="email" id="email" class="form-control boxed" required value="{{$user->email}}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for='password' class="col-sm-3">Password</label>
                    <div class="col-sm-9">
                        <input type="password" name="password" id="password" class="form-control boxed"  placeholder="blank to use old password">
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
               <div class="form-group row">
                <label for="photo" class="col-sm-4">Photo</label>
                <div class="col-sm-8">
                    <input type="file" id="real-file" hidden="hidden" accept="img/*" onchange="preview(event)" name="photo"/>

                    <button type="button" id="custom-button" class="btn btn-primary btn-oval "><i class="fa fa-folder-open"></i> Browse</button>
                    <span id="custom-text">chose a photo</span>
                    <div class="mt-3">
                    <img src="{{asset($user->photo)}}" alt="" width="150" id="img">
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
    </script>
     <script>

        $(document).ready(function(){
        $("#slidebar-menu li").removeClass('active open');
        $("#slidebar-menu li li ul li").removeClass('active');

        $("#menu_config").addClass('active open');
        $("#collapse_config").addClass('collapse  in');
        $("#user_menu").addClass('active');
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
