@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="text-center">
            <h1>Update Notes</h1>
        </div>

        <!-- create new note -->
        <div class="container">
            <form class="form-horizontal" method="POST" action="{{ route('update.note') }}" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="exampleInputEmail1">Title</label>
                <input type="text" name="title" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $note->title }}">                
            </div>
            <input type="hidden" name="id" value="{{ $note->id }}">
            <div class="form-group">
                <label for="exampleInputEmail1">Body</label>
                <textarea name="body" class="form-control" aria-describedby="emailHelp">{{ $note->body }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection