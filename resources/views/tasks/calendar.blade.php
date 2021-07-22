@extends('layouts.app')

@section('container')
    <div id='calendar'></div>
@endsection

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            locale: 'ko',
            initialView: 'dayGridMonth',
            selectable: true,
            editable: true,
            events: function(info, successCallback, failureCallback){
                var tasks = [];
                var xhr = new XMLHttpRequest();
                xhr.open('GET', '{{route('task.list')}}', true);
                xhr.responseType='json';
                xhr.send();
                xhr.onload = function() {
                    if(xhr.status == 200) {
                        xhr.response.forEach(element => {
                            tasks.push(element);
                        });
                    }
                }
            }
            // [
            //     {
            //         title: 'test',
            //         start: '2021-07-01',
            //         end: '2021-07-03'
            //     }
            // ]
        });
        calendar.render();
    });
</script>
