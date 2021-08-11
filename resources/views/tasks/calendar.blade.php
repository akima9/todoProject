@extends('layouts.app')

@section('content')
    <div class="container">
        <div id='calendar'></div>
    </div>
@endsection

<script>
    var date = new Date();

    function formatDate(date)
    {
        let formatted_date = date.getFullYear() + "-" + (date.getMonth() + 1) + "-" + date.getDate()
        return formatted_date;
    }//end function

    function taskUpdate(id, startDate, endDate)
    {
        let start = formatDate(startDate);
        let end = formatDate(endDate);
        let data = {};
        data.start = start;
        data.end  = end;
        let json = JSON.stringify(data);

        let xhr = new XMLHttpRequest();
        xhr.open("PUT", '/api/tasks/' + id, true);
        xhr.setRequestHeader('Content-type','application/json; charset=utf-8');
        xhr.onload = function () {
            var data = JSON.parse(xhr.responseText);
            if (xhr.readyState == 4 && xhr.status == "200") {
                if (data === 1) {
                    alert("일정이 수정 되었습니다.");
                }
            } else {
                alert("오류");
            }
        }
        xhr.send(json);
    }//end function

    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            locale: 'ko',
            initialView: 'dayGridMonth',
            selectable: true,
            editable: true,
            eventSources: [
                {
                    url: '{{route('restTask.list', ['id' => Auth::id()])}}',
                    method: 'GET',
                    success: function(data) {
                        console.log(data);
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
            eventResize: function(info) {
                taskUpdate(info.event.id, info.event.start, info.event.end);
            },
            eventDrop: function(info) {
                taskUpdate(info.event.id, info.event.start, info.event.end);
            },
        });
        calendar.render();
    });
</script>
