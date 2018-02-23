@extends('template')
@section('content')
    <div class="container">
        <h2>Edit Event</h2>
        <hr />
        <form action="{{ route('tasks.update', $event->id) }}" method="post">
            {{ csrf_field() }}
            <div class="form-group col-md-8 col-md-offset-2">
                <label for="name">Edit Event:</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $event->name }}">
            </div>
            <div class="form-group col-md-8 col-md-offset-2">
                <label for="description">Edit Description:</label>
                <textarea class="form-control" id="description" name="description">{{ $event->description }}</textarea>
            </div>
            <div class="form-group col-md-8 col-md-offset-2">
                <label for="backgroundColor">Edit Color</label>
                <input type="color" class="form-control" name="backgroundColor" value="{{ $event->backgroundColor }}">
            </div>
            <div class="form-group col-md-8 col-md-offset-2">
                <button type="submit" class="btn btn-primary btn-lg">Submit Edit</button> 
            </div>
        </form>
    </div>
@endsection