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
                    url: '{{route('restTask.list')}}',
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
            eventResize: function(info) {
                //날짜 포맷 변경 : start
                var date = new Date();
                const formatDate = (date)=>{
                    let formatted_date = date.getFullYear() + "-" + (date.getMonth() + 1) + "-" + date.getDate()
                    return formatted_date;
                }
                var start = formatDate(info.event.start);
                var end = formatDate(info.event.end);
                //날짜 포맷 변경 : end

                var data = {};
                data.start = start;
                data.end  = end;
                var json = JSON.stringify(data);

                var xhr = new XMLHttpRequest();
                xhr.open("PUT", '/api/tasks/' + info.event.id, true);
                xhr.setRequestHeader('Content-type','application/json; charset=utf-8');
                xhr.onload = function () {
                    var data = JSON.parse(xhr.responseText);
                    if (xhr.readyState == 4 && xhr.status == "200") {
                        if (data === 1) {
                            alert("일정이 수정되었습니다.");
                        }
                    } else {
                        console.error(data);
                    }
                }
                xhr.send(json);
            },
        });
        calendar.render();
    });
</script>
