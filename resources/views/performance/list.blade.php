@extends('layouts.default')
@section('content')
<div class="md-col-2 mt-2 mb-2">
    <a type="button" href="{{ route('performanceModify') }}" class="btn btn-primary">Add Performance</a>
</div>
<table id="performanceList" class="display">
    <thead>
        <tr>
            <th width="70%">Performance</th>
            <th width="20%">Date</th>
            <th width="10%">Show</th>
        </tr>
    </thead>
    <tbody>
        @foreach($performance as $que)
        <tr>
            <td>{{$que->title}}</td>
            <td>{{$que->date}}</td>
            <td>Show</td>
        </tr>
        @endforeach
    </tbody>
</table>
@stop

@push('script')
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready( function () {
            $('#performanceList').DataTable();
        } )
    </script>
@endpush