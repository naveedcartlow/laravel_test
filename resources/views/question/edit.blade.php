@extends('layouts.default')
@section('content')
    <h1>Add/Update Questions</h1>
    <form method="post" action="{{ route('questionSave', ['id'=>$id]) }}" accept-charset="UTF-8">
        <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
        <div class="mb-3">
            <label for="questions" class="form-label">Question</label>
            <input type="text" class="form-control" id="question" name="question" placeholder="Question" value="{{ old('question', $params['question']) }}">
            @error('question')
                <div class="@error('question') is-invalid @enderror" >{{ $message }}</div>
            @enderror
        </div>
        <div class="row">
            <div class="col">
                <input type="text" class="form-control" name="answers1" placeholder="Answer 1" aria-label="Answer 1" value="{{ old('answers1', $params['answers1']) }}">
                @error('answers1')
                    <div class="@error('answers1') is-invalid @enderror" >{{ $message }}</div>
                @enderror
            </div>
            <div class="col">
                <input type="text" class="form-control" name="answers2" placeholder="Answer 2" aria-label="Answer 2" value="{{ old('answers2', $params['answers2']) }}">
                @error('answers2')
                    <div class="@error('answers2') is-invalid @enderror" >{{ $message }}</div>
                @enderror
            </div>
            <div class="col">
                <input type="text" class="form-control" name="answers3" placeholder="Answer 3" aria-label="Answer 3" value="{{ old('answers3', $params['answers3']) }}">
                @error('answers3')
                    <div class="@error('answers3') is-invalid @enderror" >{{ $message }}</div>
                @enderror
            </div>
        </div>
        <button class="btn btn-primary mt-2 float-right" type="submit" >Submit</button>
    {!! Form::close() !!}
@stop

@push('css')
<style>
.float-right {float: right;}
</style>
@endpush