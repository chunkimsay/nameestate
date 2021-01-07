@extends('back.layouts.master')
@section('header')
<strong>Edit Company info</strong>
@endsection
@section('content')
   <div class="row ">

    <div class="col-sm-4 ">
        <form action="{{ route('company.update',$com->id) }}" method="POST">
            @csrf
            @method('PATCH')
            <button class="btn btn-primary btn-oval"><i class="fa fa-download"></i>Update</button>
            <a href="{{ route('company.index') }}" class="btn btn-warning btn-oval"><i class="fa fa-reply-all"></i>Back</a>
            <hr>
            <div class="form-group row">
                <label for="email" class="col-sm-4">Email:</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control boxed" name="email" value="{{ $com->email }}" autofocus>
                </div>
            </div>
            <div class="form-group row">
                <label for="email" class="col-sm-4">Phone:</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control boxed" name="phone" value="{{ $com->phone }}">
                </div>
            </div>
            <div class="form-group row">
                <label for="email" class="col-sm-4">Working Days:</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control boxed" name="workingday" value="{{ $com->workingday}}">
                </div>
            </div>
            <div class="form-group row">
                <label for="email" class="col-sm-4">Working Hours:</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control boxed" name="workinghour" value="{{ $com->workinghour }}">
                </div>
            </div>
            <div class="form-group row">
                <label for="email" class="col-sm-4"><Address>Address:</Address></label>
                <div class="col-sm-8">
                    <textarea name="address" id="" cols="30" rows="3" class="form-control boxed">{{ $com->address }}</textarea>
                </div>
            </div>
        </form>
    </div>
   </div>
@endsection
