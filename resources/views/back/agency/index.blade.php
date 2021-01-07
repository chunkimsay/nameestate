@extends('back.layouts.master')
@section('content')
        <a href="{{ route('agency.create') }}" class="btn btn-primary btn-oval"><i class="fa fa-upload"></i> Create</a>
        @component('comp.alert')

        @endcomponent
        <table class="table table-sm">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Photo</th>
                    <th>Name</th>
                    <th>Position</th>
                    <th>Email</th>

                    <th>Phone</th>
                    <th>Description</th>
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
                @foreach ($agency as $agen)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td><img src="{{ asset($agen->photo )}}" alt="" width="70px"></td>
                        <td>{{ $agen->name }}</td>
                        <td>{{ $agen->position }}</td>
                        <td>{{ $agen->email }}</td>
                        <td>{{ $agen->phone }}</td>
                        <td>{{ $agen->description }}</td>
                        <td>
                            <a href="{{ route('agency.edit',$agen->id) }}" class="btn btn-sm btn-primary btn-pill-left">
                                <i class="fa fa-edit"></i> Edit
                            </a>
                            <a href="{{ route('agency.delete',$agen->id) }}" class="btn btn-sm btn-danger btn-pill-right" onclick="return confirm('Do you want to delete?')">
                                <i class="fa fa-trash "></i> Delete
                            </a>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
        {{ $agency->appends(request()->query())->links() }}
@endsection
@section('js')
   <script>
        $(document).ready(function(){
        $("#slidebar-menu li").removeClass('active open');
        $("#slidebar-menu li  ul li").removeClass('active');

        $("#menu_agency").addClass('active');
        });
   </script>
@endsection
