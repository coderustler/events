@extends('template')

@section('content')
    <div class="container">
        <h3>Laravel Events Calendar</h3>
        <div id='calendar'></div>
    </div>

    <!-- Scripts -->
    <script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.js'></script>
    <script>
        $(document).ready(function() {
            
            // page is now ready, initialize the calendar...
            $('#calendar').fullCalendar({
                
                //Put your options and callbacks here
                //Make the event dragable, resizabe, change opacity
                editable: true,
                dragOpacity: .60,
                events : [
                    
                    @foreach($events as $event)
                    {
                        id : '{{ $event->id }}',
                        title : "{!! $event->title !!}",
                        start : "{!! $event->start !!}",
                        end : '{{ $event->end }}',
                        backgroundColor : '{{  $event->backgroundColor }}',
                        url : '{{ route('events.edit', $event->id) }}',
                        ajax : true,
                    },
                    @endforeach

                ],
                //Show the event entry form when a day is clicked
                dayClick: function(date, jsEvent, view) {
                    //Change background color of day when it is clicked
                    $(this).css('background-color', '#bed7f3');
                    //Get the date that was clicked
                    var date_clicked =  date.format();
                    //Redirect to the new event entry form
                    window.location.href = "{{URL::to('events')}}" + "/" + date_clicked;
                },
                eventClick: function(event, jsEvent, view) {
                    $(this).css('background-color', '#ff0000');
                },
                eventDragStart: function(event, jsEvent, view) {
                    $(this).css('background-color', '#00ff00');
                },
                // drop on a new date and submit to database
                eventDrop: function(event, delta, revertFunc, jsEvent, view) {
                    
                    swal({
                        title: "You moved the event. Save it?",
                        text: "You can move it as mush as you want.",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                        })
                        .then(function(willDelete){
                        if (willDelete) {
                            swal("Moved. Your event has been rescheduled.", {
                            icon: "success",
                            });
                    
                            $.ajax({
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                },
                                dataType: 'json',
                                type:'POST',
                                url: '{{ route('update', 0) }}',
                                data:{
                                        id:event.id,
                                        start:event.start.format(),
                                        end:event.end.format(),
                                    },
                                success: function(data){
                                }, 
                            });

                        } else {
                            swal("Your event has not been rescheduled.");
                            revertFunc();
                        }
                    });   
                },
                eventResize: function(event, delta, revertFunc){
                    swal({
                        title: "Changed Timeline. Save it?",
                        text: "You can expand it as far as you need to.",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                        })
                        .then(function(willDelete){
                        if (willDelete) {
                            swal("Moved! Your event has been rescheduled!", {
                            icon: "success",
                            });
                    
                            $.ajax({
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                },
                                dataType: 'json',
                                type:'POST',
                                url: '{{ route('update', 0) }}',
                                data:{
                                        id:event.id, 
                                        start:event.start.format(),
                                        end:event.end.format()
                                    },
                                success: function(data){
                                }, 
                            });
                            
                        } else {
                            swal("Your event has not been rescheduled.");
                            revertFunc();
                        }
                    });   
                },
            })
        });
        
    </script>

@endsection    
