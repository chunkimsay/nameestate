
@extends('back.layouts.master')
@section('content')
<form action="{{route('user.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group row">
           <div class="col-sm-6">
            <button class=" btn btn-oval btn-primary mr-2"><i class="fa fa-save"></i> Save</button>
            <a href="#" class="btn  btn-warning btn-oval"><i class="fa fa-undo"></i> Back</a>
           </div>
        </div>
        <div class="row">

            <div class="col-sm-6">
                @component('comp.alert')

                @endcomponent

                <div class="form-group row">
                    <label for="name" class="col-sm-3">Name <span class="text-danger">*</span></label>
                    <div class="col-sm-9">
                    <input type="text" name="name" id="name" class="form-control boxed" autofocus required value="{{old('name')}}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="username" class="col-sm-3">Username<span class="text-danger">*</span></label>
                    <div class="col-sm-9">
                    <input type="text" name="username" id="username" class="form-control boxed" required autocomplete="off">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="role" class="col-sm-3">Role <span class="text-danger">*</span></label>
                    <div class="col-sm-9">
                        <select name="role" id="role">
                            <label for="cars">Choose a Role:</label>
                                <option value="admin">Admin</option>
                                <option value="viewer">Viewer</option>
                                <option value="agency">Agency</option>
                            
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="email" class="col-sm-3">Email<span class="text-danger">*</span></label>
                    <div class="col-sm-9">
                    <input type="email" name="email" id="email" class="form-control boxed" required >
                    </div>
                </div>
                <div class="form-group row">
                    <label for='password' class="col-sm-3">Password<span class="text-danger">*</span></label>
                    <div class="col-sm-9">
                        <input type="password" name="password"  class="form-control boxed" autocomplete="off" >
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
               <div class="form-group row">

                <div class="col-sm-8">
                    <input type="file" id="real-file" hidden="hidden" accept="img/*" onchange="preview(event)" name="photo"/>

                    <button type="button" id="custom-button" class="btn btn-primary btn-oval "><i class="fa fa-folder-open"></i> Browse</button>
                    <span id="custom-text">chose a photo</span>
                    <div class="mt-3">
                        <img src="" alt="" width="150" id="img">
                    </div>
                </div>
               </div>
            </div>
        </div>
    </form>
@endsection
@section('js')
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
    <script>
        function preview(evt)
           {
               let img = document.getElementById('img');
               img.src = URL.createObjectURL(evt.target.files[0]);
           }
    </script>
@endsection
