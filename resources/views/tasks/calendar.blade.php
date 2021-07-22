@extends('layouts.app')

@section('container')
    <div id='calendar'></div>
@endsection

<script>
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

    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            locale: 'ko',
            initialView: 'dayGridMonth',
            selectable: true,
            editable: true,
            events: function(){
                tasks.forEach(element => {
                    return element;
                });
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
