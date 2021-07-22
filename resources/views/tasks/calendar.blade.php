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
            eventSources: [
                {
                    url: '{{route('task.list')}}',
                    method: 'GET',
                    success: function(data) {
                        return data.eventArray;
                    },
                    failure: function(data){
                        console.log(data);
                    }
                }
            ],
            eventClick: function(info) {
                location.href = '/tasks/' + info.event.id;
            },
        });
        calendar.render();
    });
</script>
