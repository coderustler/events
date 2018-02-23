@extends('template')
@section('content')
    <div class="container">
        <h2>Create a new event</h2>
        <hr />
        <form action="{{ route('tasks.store') }}" method="post">
            {{ csrf_field() }}
            <input type="hidden" name="task_date" class="date" value="{{ $date }}" />
            <div class="form-group col-md-8 col-md-offset-2">
                <label for="name">Enter Task:</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Enter Event" required>
            </div>
            <div class="form-group col-md-8 col-md-offset-2">
                <label for="description">Description:</label>
                <textarea class="form-control" id="description" name="description" placeholder="Event Description" required></textarea>
            </div>
            <div class="form-group col-md-8 col-md-offset-2">
                <label for="backgroundColor">Color</label>
                <input type="color" class="form-control" name="backgroundColor" required>
            </div>
            <div class="form-group col-md-8 col-md-offset-2">
                <button type="submit" class="btn btn-primary btn-lg">Save</button> 
            </div>
        </form>
    </div> 
@endsection   