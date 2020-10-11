
@extends('layouts.admin')
@section('content')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title"></h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            @include('flash::message')
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>trip number</th>
                    <th>bus number</th>
                    <th>from</th>
                    <th>to</th>
                    <th>Available Seats</th>
                    <th>booked Seats</th>
                </tr>
                </thead>
                <tbody>
                @foreach($trips as $trip)
                    <tr>
                        <td>{{$trip->id}}</td>
                        <td>{{$trip->start_station[0]->bus->bus_no}}</td>
                        <td>{{$trip->start_station[0]->station->name}}</td>
                        <td>{{$trip->final_station[0]->station->name}}</td>
                        <td>{{count($trip->available_seats)}}</td>
                        <td>{{count($trip->booked_seats)}}</td>

                    </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <th>trip number</th>
                    <th>bus number</th>
                    <th>from</th>
                    <th>to</th>
                    <th>Available Seats</th>
                    <th>booked Seats</th>
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
