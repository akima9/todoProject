@extends('layouts.app')

@section('container')
    <div id='calendar'></div>
    {{-- @foreach ($tasks as $task)
        <div class="block border border-blue-500 rounded py-2 px-4 hover:bg-blue-100 my-5">
            <a href="{{ route('task.show', ['id' => $task['id']]) }}">
                <div>
                    <span class="font-extrabold text-2xl">{{ $task['title'] }}</span>
                    <span class="text-sm float-right">{{ $task['updated_at'] }}</span>
                </div>
                <p class="p-5">{{ $task['contents'] }}</p>
            </a>
        </div>
    @endforeach --}}
@endsection

<script>
    function getTasks(){
        var xhr = new XMLHttpRequest();
        xhr.open('GET', '{{route('task.list')}}', true);
        xhr.send();
        xhr.onload = function() {
            if(xhr.status == 200) {
                return xhr.responseText;
            }
        }
    }

    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            locale: 'ko',
            initialView: 'dayGridMonth',
            selectable: true,
            editable: true,
            eventSources: [{
                events: getTasks()
            }]
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
