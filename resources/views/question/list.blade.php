@extends('layouts.default')
@section('content')
<div class="md-col-2 mt-2 mb-2">
    <a type="button" href="{{ route('questionModify') }}" class="btn btn-primary">Add Question</a>
</div>
<table id="questionList" class="display">
    <thead>
        <tr>
            <th width="80%">Questions</th>
            <th width="20%">action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($questions as $que)
        <tr>
            <td>{{$que->question}}</td>
            <td class="sorting_1"><a type="button" href="{{ route('questionModify', $que->id) }}" class="btn btn-primary">Edit Question</a></td>
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
            $('#questionList').DataTable();
        } )
    </script>
@endpush