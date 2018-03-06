<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.css' />
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <title>Laravel Events Calendar</title>
    </head>
    <body>

        <!-- navigation goes here -->

        @yield('content')

        <!-- javacript here -->

    <script>

        $('#delete_btn').click(function(){
            
            swal({
                title: "Delete the event?",
                text: "Once deleted, it is gone!.",
                icon: "warning",
                buttons: true,
                dangerMode: true,
                })
                .then(function(willDelete){
                if (willDelete) {
                    swal("Bye Bye!. Your event has been deleted.", {
                    icon: "success",
                    });
            
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        dataType: 'json',
                        type:'post',
                        url: '{{ route('events.destroy', 6) }}',
                        data:{
                                id:event.id,
                            },
                        success: function(data){

                            alert('in success and data = ' + data)
                        }, 
                        error: function(data){
                            alert('in error and data = ' + data)
                        }
                    });

                } else {
                    swal("Your event has not been deleted.");
                }
            });

        });

    </script>

    </body>
</html>