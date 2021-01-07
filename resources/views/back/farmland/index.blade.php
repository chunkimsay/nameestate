@extends('back.layouts.master')
@section('header')
<strong>Farmland</strong>
@endsection
@section('content')
<a href="{{route('farmland.create')}}" class="btn btn-primary btn-oval"><i class="fa fa-plus"></i> create</a>
@component('comp.alert')

@endcomponent
<table class="table ">
    <thead>
        <th>#</th>
        <th>Photo</th>
        <th>Size</th>
        <th>Location</th>
        <th>Potaintial</th>
        <th>Description</th>
        <th>Price</th>
        <th>For</th>
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
        @foreach ($farmland as $farm)
            <tr>
                <td>{{ $i++ }}</td>
                <td><img src="{{ asset($farm->photo) }}" alt="" width="50px"></td>
                <td>{{ $farm->size }}</td>
                <td>{{ $farm->location }}</td>
                <td>{{ $farm->potaintial }}</td>
                <td>{{ $farm->description }}</td>
                <td>{{ $farm->price }}</td>
                <td>{{ $farm->fname }}</td>
                <td>

                <a href="{{route('farmland.edit',$farm->id)}}" class="btn btn-oval btn-sm btn-primary"><i class="fa fa-edit"></i>Edit</a>
                <a href="{{route('farmland.delete',$farm->id)}}" class="btn btn-sm btn-oval btn-danger" onclick="return confirm('Do you want to delete?')"><i class="fa fa-trash"></i> Delete</a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
{{$farmland->appends(request()->query())->links()}}
@endsection
@section('js')
<script>
    $(document).ready(function(){
    $("#slidebar-menu li").removeClass('active open');
    $("#slidebar-menu li  ul li").removeClass('active');

    $("#menu_post").addClass('active');
    $("#collapse_post").addClass('collapse  in');
    $("#farm_menu").addClass('active');
    });
</script>
@endsection
