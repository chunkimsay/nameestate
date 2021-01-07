@extends('back.layouts.master')
@section('header')
    <strong>Edit location <i class="fab fa-location-slash"></i></strong>
@endsection
@section('content')
        <form action="{{ route('location.update',$location->id) }}" method="POST" class="" >
            @csrf
            @method('PATCH')
            <button class=" btn btn-oval btn-primary"><i class="fa fa-download"></i> Save</button>
            <a href="{{ route('location.index') }}" class=" btn btn-oval btn-warning"><i class="fa fa-reply-all"></i> Back</a>
            <div class="col-sm-4">
                @component('comp.alert')

                @endcomponent
                <hr>
                <div class="form-group row">
                    <label for="location" class="col-sm-4">Location</label>
                    <div class="col-sm-8">
                        <input type="text" name="name" id="" class="form-control boxed" value="{{ $location->name }}" required autofocus>
                    </div>
                </div>
            </div>
        </form>
@endsection
