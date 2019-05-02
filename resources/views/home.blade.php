@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        @if($notes->isEmpty())
            <div class="card">
                <div class="card-header text-center">Welcome {{ Auth::user()->name }} to simple note!</div>

                <div class="card-body text-center">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    Look like you don't have any note here, click below button to start
                </div>
                <div class="card-footer text-center">
                    <a href="{{ route('create.note.page') }}"><button class="btn btn-primary">Create Note</button></a>
                </div>
            </div>
        @else
        <div class="row">
            @foreach($notes as $note)
                <div class="col-sm-6">
                    <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $note->title }}</h5>
                        <p class="card-text">{{ $note->body }}</p>
                        <a href="{{ Route('update.note.page', $note->id) }}" class="btn btn-primary">Update</a>
                        <a href="{{ Route('delete.note', $note->id) }}" class="btn btn-danger">Delete</a>
                    </div>
                    </div>
                </div>
            @endforeach            
        </div>
        @endif
        </div>
    </div>
</div>

@endsection
