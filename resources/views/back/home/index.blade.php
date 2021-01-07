@extends('back.layouts.master')
@section('header')
<strong>Home</strong>
@endsection
@section('content')
<a href="{{route('home.create')}}" class="btn btn-primary btn-oval"><i class="fa fa-plus"></i> create</a>
@component('comp.alert')

@endcomponent
<table class="table table-sm table-bordered">
    <thead>
        <tr>
            <th>#</th>
            <th>Photo</th>
            <th>Home Size</th>
            <th>Land Size</th>
            <th>Type</th>
            <th>Bedroom</th>
            <th>Basroom</th>
            <th>Location</th>
            <th>Potaintial</th>

            <th>For</th>
            <th>Action</th>
        </tr>
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
        @foreach ($home as $h)
            <tr>
                <td>{{ $i++ }}</td>
                <td><img src="{{ asset($h->photo) }}" alt="" width="50px"></td>
                <td>{{ $h->hsize }}</td>
                <td>{{ $h->lsize }}</td>
                <td>{{ $h->type }}</td>
                <td>{{ $h->bedroom }}</td>
                <td>{{ $h->basroom }}</td>
                <td>{{ $h->location }}</td>
                <td>{{ $h->potaintial }}</td>
                <td>{{ $h->fname }}</td>



                <td>

                    <a href="{{route('home.edit',$h->id)}}" class="btn btn-oval btn-sm btn-primary"><i class="fa fa-edit"></i>Edit</a>
                      <a href="{{route('home.delete',$h->id)}}" class="btn btn-sm btn-oval btn-danger" onclick="return confirm('Do you want to delete?')"><i class="fa fa-trash"></i> Delete</a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
{{$home->appends(request()->query())->links()}}
@endsection
@section('js')
<script>
    $(document).ready(function(){
    $("#slidebar-menu li").removeClass('active open');
    $("#slidebar-menu li  ul li").removeClass('active');

    $("#menu_post").addClass('active');
    $("#collapse_post").addClass('collapse  in');
    $("#home_menu").addClass('active');
    });
</script>
@endsection
