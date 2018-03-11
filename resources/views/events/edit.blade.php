@extends('template')
@section('content')
    <div class="container">
        <h2>Edit Event</h2>
        <hr>
        <div>
            <form action="{{ route('events.update', $event->id) }}" method="post">
                {{ csrf_field() }}
                <div class="form-group col-md-8 col-md-offset-2">
                    <label for="name">Edit Event:</label>
                    <input type="text" class="form-control" id="name" name="title" value="{{ $event->title }}">
                </div>
                <div class="form-group col-md-8 col-md-offset-2">
                    <label for="description">Edit Description:</label>
                    <textarea class="form-control" id="description" name="description">{{ $event->description }}</textarea>
                </div>
                <div class="form-group col-md-2 col-md-offset-2">
                    <label for="backgroundColor">Edit Color</label>
                    <input type="color" class="form-control" name="backgroundColor" value="{{ $event->backgroundColor }}">
                </div>
                <div class="form-group col-md-7 col-md-offset-2">
                    <button type="submit" class="btn btn-primary btn-lg">Submit Edit</button> 
                </div>
            </form>
        </div>
        <div style="float: left;">
            <form action="{{ url('events', $event->id) }}" method="post">
                <input type="hidden" name="_method" value="DELETE">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="event_id" value="{{ $event->id }}">
                <input type="submit" class="btn btn-danger btn-lg" value="Delete">
            </form>
        </div>
           
    </div>
@endsection

