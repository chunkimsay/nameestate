@extends('back.layouts.master')
@section('content')
    <a href="{{route('user.create')}}" class="btn  btn-oval btn-primary">
        <i class="fa fa-plus"></i> Create
    </a>
    <div class="card">
        @component('comp.alert')

        @endcomponent
        <table class="table table-sm table-bordered">
            <thead class="bg-warning">
                <tr>
                    <th>ID</th>
                    <th>Photo</th>
                    <th>Name</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $page = @$_GET['page'];
                    if(!$page)
                    {
                        $page=1;
                    }
                    $i = config('app.row')*($page-1)+1;
                ?>
                @foreach ($user as $item)
                <tr>
                    <td>{{$i++}}</td>
                    <td><img src="{{ asset($item->photo) }}" alt="" width="45px"></td>
                    <td>{{$item->name}}</td>
                     <td>{{$item->username}}</td>
                     <td>{{ $item->email }}</td>
                     <td>
                         <a href="{{route('user.edit',$item->id)}}" class="btn btn-sm  btn-primary btn-oval "><i class="fa fa-edit"></i></a>
                     <a href="{{route('user.delete',$item->id)}}" class="btn btn-sm btn-danger btn-oval"><i class="fa fa-trash"></i> </a>
                     </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
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
@endsection
