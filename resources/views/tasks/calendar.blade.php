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
            ]
        });
        calendar.render();
    });
</script>
