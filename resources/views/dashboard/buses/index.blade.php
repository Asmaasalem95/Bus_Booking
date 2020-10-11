@extends('layouts.admin')
@section('content')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title"> </h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            @include('flash::message')
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>id</th>
                    <th>number</th>
                    <th>Stations</th>
                    <th>Created Date</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($buses as $bus)
                    <tr>
                        <td>{{$bus->id}}</td>
                        <td>{{$bus->bus_no}}</td>
                        <td>
                            <ul>
                                @foreach($bus->stations as $station)
                               <li>{{$station->name}}(stop number: {{$station->pivot->stop_no}})</li>
                                @endforeach
                            </ul>

                        </td>

                    </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <th>id</th>
                    <th>number</th>
                    <th>Stations</th>
                    <th>Created Date</th>
                    <th>Actions</th>
                </tr>
                </tfoot>
            </table>
        </div>
        <!-- /.box-body -->
    </div>
@endsection
@section('scripts')
    <script src="{{asset('/admin_assets/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('/admin_assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
    <!-- page script -->
    <script>
        $(function () {
            $('#example1').DataTable()
            $('#example2').DataTable({
                'paging'      : true,
                'lengthChange': false,
                'searching'   : false,
                'ordering'    : true,
                'info'        : true,
                'autoWidth'   : false
            })
        })
    </script>
@endsection
