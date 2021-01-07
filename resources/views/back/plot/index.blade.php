@extends('back.layouts.master')
@section('content')
    <a href="{{route('plot.create')}}" class="btn btn-primary btn-oval"><i class="fa fa-plus"></i> Create</a>
    <table class="table table-md">
        @component('comp.alert')

        @endcomponent
        <thead>
            <tr>
                <th>#</th>
                <th>photo</th>
                <th>Size</th>
                <th>Price</th>
                <th>Location</th>
                <th>Potaintial</th>
                <th>For</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $page = @$_GET['page'];
                if(!$page)
                {
                    $page =1;
                }
                $i = config('app.row')*($page-1)+1;

            ?>
            <tr>
                @foreach ($plot as $p)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>
                            <img src="{{ asset($p->photo) }}" alt="" width="50px">
                        </td>
                        <td>{{ $p->size }}</td>
                        <td>{{ $p->price }}</td>
                        <td>{{ $p->location}}</td>
                       <td>{{$p->potaintial}}</td>
                       <td>{{ $p->fname }}</td>
                       <td>
                           <a href="{{route('plot.edit',$p->id)}}" class="btn btn-sm btn-primary btn-oval">
                               <i class="fa fa-edit"> Edit</i>
                           </a>
                        <a href="{{route('plot.delete',$p->id)}}" class="btn btn-sm btn-oval btn-danger text-white" onclick="return confirm('Do you want to delete?')"><i class="fa fa-trash"></i>  Delete</a>
                       </td>
                    </tr>
                @endforeach
            </tr>
        </tbody>
    </table>
    {{$plot->appends(request()->query())->links()}}
@endsection
@section('js')
<script>
    $(document).ready(function(){
    $("#slidebar-menu li").removeClass('active open');
    $("#slidebar-menu li  ul li").removeClass('active');

    $("#menu_post").addClass('active');
    $("#collapse_post").addClass('collapse  in');
    $("#plot_menu").addClass('active');
    });
</script>
@endsection
