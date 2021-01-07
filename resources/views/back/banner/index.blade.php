@extends('back.layouts.master')
@section('content')
        <a href="{{ route('banner.create') }}" class="btn btn-primary btn-oval"><i class="fa fa-upload"></i> Create</a>
        @component('comp.alert')

        @endcomponent
        <table class="table table-sm">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Photo</th>
                    <th>title</th>
                    <th>Size</th>
                    <th>Bedroom</th>
                    <th>Bathroom</th>
                    <th>Type</th>
                    <th>Sequence</th>
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
                @foreach ($banner as $b)
                        <tr>
                        <td>{{$i++}}</td>
                        <td>
                            <img src="{{ asset($b->photo) }}" alt="" width="55px">
                        </td>
                         <td>{{$b->title}}</td>
                         <td>{{$b->size}}</td>
                         <td>{{$b->bedroom}}</td>
                         <td>{{ $b->bathroom }}</td>
                         <td>{{$b->type}}</td>
                         <td>{{ $b->sequence }}</td>
                         <td>{{$b->fname}}</td>
                         <td>
                         <a href="{{route('banner.edit',$b->id)}}" class="btn btn-sm btn-primary btn-oval"><i class="fa fa-edit"></i> Edit</a>
                             <a href="{{ route('banner.delete',$b->id) }}" class="btn btn-sm btn-danger btn-oval"><i class="fa fa-trash"></i> Delete</a>
                         </td>
                        </tr>
                @endforeach

            </tbody>
        </table>
        {{ $banner->appends(request()->query())->links() }}
@endsection
@section('js')
   <script>
        $(document).ready(function(){
        $("#slidebar-menu li").removeClass('active open');
        $("#slidebar-menu li  ul li").removeClass('active');

        $("#menu_banner").addClass('active');
        });
   </script>
@endsection
