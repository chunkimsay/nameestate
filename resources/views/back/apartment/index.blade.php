@extends('back.layouts.master')
@section('content')
<a href="{{ route('apartment.create') }}" class="btn btn-primary btn-oval"><i class="fa fa-plus"></i> Create</a>
@component('comp.alert')

@endcomponent
<table class="table">
    <thead>
        <tr>
            <th>#</th>
            <th>Photo</th>
            <th>Size</th>
            <th>Floor</th>
            <th>Bedroom</th>
            <th>Basroom</th>
            <th>Price</th>
            <th>
                Location
            </th>
            <th>Potaintial</th>
            <th>Description</th>
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
       @foreach ($apartment as $apart)
            <tr>
                <td>{{ $i++ }}</td>
                <td><img src="{{ asset($apart->photo) }}" alt="" width="50px"></td>
                <td>{{ $apart->size }}</td>
                <td>{{ $apart->floor }}</td>
                <td>{{ $apart->bedroom }}</td>
                <td>{{ $apart->besroom }}</td>
                <td>{{ $apart->price }}</td>
                <td>{{ $apart->location }}</td>
                <td>{{ $apart->potaintial }}</td>
                <td>{{ $apart->description }}</td>
                <td>{{ $apart->fname }}</td>
                <td>
                   <div class="btn-group">
                    <a href="{{ route('apartment.edit',$apart->id) }}" class="btn btn-sm btn-primary "><i class="fa fa-edit"></i></a>
                    <a href="{{ route('apartment.delete',$apart->id) }}" class="btn btn-sm btn-danger " onclick="return confirm('Do you wanto to delete?')"><i class="fa fa-trash"></i> </a>
                   </div>

                </td>
            </tr>
       @endforeach
    </tbody>
</table>
{{$apartment->appends(request()->query())->links()}}
@endsection
@section('js')
<script>
    $(document).ready(function(){
    $("#slidebar-menu li").removeClass('active open');
    $("#slidebar-menu li  ul li").removeClass('active');

    $("#menu_post").addClass('active');
    $("#collapse_post").addClass('collapse  in');
    $("#apart_menu").addClass('active');
    });
</script>
@endsection
