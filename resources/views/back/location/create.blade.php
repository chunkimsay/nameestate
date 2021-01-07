 @extends('back.layouts.master')
@section('header')
    <strong>Create <i class="fab fa-location-slash"></i></strong>
@endsection
@section('content')
        <form action="" method="POST" class="" >
            @csrf
            <button class=" btn btn-oval btn-primary"><i class="fa fa-download"></i> Save</button>
            <button class=" btn btn-oval btn-warning"><i class="fa fa-reply-all"></i> Back</button>
            
        </form>
@endsection

