@extends('layouts.default')
@section('content')
    <h1>Add/Update Performace</h1>
    <form method="post" action="{{ route('performanceSave', ['id'=>$id]) }}" accept-charset="UTF-8">
        <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
        <div class="row">
            <div class="col">
                <input type="text" class="form-control" name="title" placeholder="Title" aria-label="Title" value="{{ old('title') }}">
                @error('title')
                    <div class="@error('title') is-invalid @enderror" >{{ $message }}</div>
                @enderror
            </div>
            <div class="col">
                <input type="text" id="datepicker" class="form-control datepicker" id="date" name="date" placeholder="Date" aria-label="Date" value="{{ old('date') }}">
                @error('date')
                    <div class="@error('date') is-invalid @enderror" >{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="question ml-sm-5 pl-sm-5 pt-2">
            @foreach($questions as $que)
                <div class="py-2 h5"><b>Question: {{$que->question}}</b></div>
                <input type="hidden" name="questions[]" value="{{$que->id}}">
                <div class="ml-md-3 ml-sm-3 pl-md-5 pt-sm-0 pt-3" id="options">
                    <label class="options"><input type="radio" name="ans-{{$que->id}}" value="{{$que->answers[0]->id}}" >{{$que->answers[0]->answers}}<span class="checkmark"></span></label>
                    <label class="options"><input type="radio" name="ans-{{$que->id}}" value="{{$que->answers[0]->id}}">{{$que->answers[1]->answers}}<span class="checkmark"></span></label>
                    <label class="options"><input type="radio" name="ans-{{$que->id}}" value="{{$que->answers[0]->id}}">{{$que->answers[2]->answers}}<span class="checkmark"></span></label>
                </div>
            @endforeach
        </div>
        <button class="btn btn-primary mt-2 float-right" type="submit" >Submit</button>
    {!! Form::close() !!}
@stop

@push('css')
<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="Stylesheet" type="text/css" />
<style>
.float-right {float: right;}
</style>
@endpush

@push('script')
<script>
    $(document).ready( function () {
        $( "#datepicker" ).datepicker({dateFormat: 'yy-mm-dd'});
    });
</script>
@endpush
@push('css')
<style>
.options{padding: 0 15px;}
</style>
@endpush