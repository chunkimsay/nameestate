@extends('back.layouts.master')
@section('header')
<strong>Condo</strong>
@endsection
@section('content')
<a href="{{route('condo.create')}}" class="btn btn-primary btn-oval"><i class="fa fa-plus"></i> create</a>
@component('comp.alert')

@endcomponent
<table class="table ">
    <thead>
        <th>#</th>
        <th>Thumnail</th>
        <th>name</th>
        <th>Location</th>
        <th>Potaintial</th>
        <th>Description</th>
        <th>Action</th>
    </thead>
    <tbody>
        @php
        $page = @$_GET['page'];
        if(!$page)
        {
            $page=1;
        }
        $i = config('app.row')*($page-1)+1;
        @endphp
        @foreach ($condo as $con)
            <tr>
                <td>{{ $i++ }}</td>
                <td><img src="{{ asset($con->bigphoto) }}" alt="" width="50px"></td>
                <td>{{ $con->name }}</td>
                <td>{{ $con->lname }}</td>
                <td>{{ $con->potaintial }}</td>
                <td>{{ $con->description }}</td>
                <td>

                    <a href="{{route('condo.edit',$con->id)}}" class="btn btn-oval btn-sm btn-primary"><i class="fa fa-edit"></i>Edit</a>
                <a href="{{route('condo.delete',$con->id)}}" class="btn btn-sm btn-oval btn-danger" onclick="return confirm('Do you want to delete?')"><i class="fa fa-trash"></i> Delete</a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
{{$condo->appends(request()->query())->links()}}
@endsection
@section('js')
<script>
    $(document).ready(function(){
    $("#slidebar-menu li").removeClass('active open');
    $("#slidebar-menu li  ul li").removeClass('active');

    $("#menu_post").addClass('active');
    $("#collapse_post").addClass('collapse  in');
    $("#condo_menu").addClass('active');
    });
</script>
@endsection
