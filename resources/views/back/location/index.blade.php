@extends('back.layouts.master')
@section('content')
        <button  class="btn btn-primary btn-oval" data-toggle="modal" data-target="#modalCart"><i class="fa fa-upload"></i> Create</button>
        @component('comp.alert')

        @endcomponent
        <div class="" >
            <table class="table  table-sm ">
                <thead class="bg-warning">
                    <tr>
                        <th>#</th>
                        <th class="">Location</th>
                        <th class="text-center">Action</th>


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
                    @foreach ($location as $b)
                            <tr>
                            <td>{{$i++}}</td>
                            <td class="">
                               {{ $b->name }}
                            </td>

                             <td class="text-center">
                                <a href="{{ route('location.edit',$b->id) }}"  class=" btn btn-primary btn-sm"   ><i class="fa fa-edit"></i></a>
                                 <a href="{{ route('location.delete',$b->id) }}" class="btn btn-sm btn-danger " onclick="return confirm('Do You Want to removed!')"><i class="fa fa-trash"></i> Delete</a>
                             </td>
                            </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
        {{ $location->appends(request()->query())->links() }}
        <!-- Button trigger modal-->

<!-- Modal: -->
<div class="modal fade" id="modalCart" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <!--Header-->
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Create Location</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <!--Body-->
      <div class="modal-body">
        <form action="{{ route('location.store') }}" method="POST" class="" >
            @csrf
            <div class="form group row">
                <label for="location" class="col-sm-4">Location</label>
                <div class="col-sm-8">
                  <input type="text" name="name" id="" class="form-control boxed">
                </div>
            </div>


      </div>
      <!--Footer-->
      <div class="modal-footer">

        <button class="btn btn-primary " type="submit"><i class="fa fa-download"></i> Save</button>
      </div>
    </form>
    </div>
  </div>
</div>
<!-- Modal: modalCart -->


@endsection
@section('js')
   <script>
        $(document).ready(function(){
        $("#slidebar-menu li").removeClass('active open');
        $("#slidebar-menu li  ul li").removeClass('active');

        $("#menu_location").addClass('active');
        });
   </script>
@endsection
