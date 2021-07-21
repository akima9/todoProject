<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.8.0/main.css">
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.8.0/main.min.js"></script>
    <title>TO-DO App</title>
</head>
<body>
    <div id="header" class="container mx-auto my-10">
        @section('header')
            <ul class="flex">
                <li class="flex-auto mr-2">
                    <a href="{{ route('task.index') }}" class="text-center block border border-blue-500 rounded py-2 px-4 bg-blue-500 hover:bg-blue-700 text-white">목록</a>
                </li>
                <li class="flex-auto mr-2">
                    <a href="{{ route('task.calendar') }}" class="text-center block border border-blue-500 rounded py-2 px-4 bg-blue-500 hover:bg-blue-700 text-white">달력</a>
                </li>
                <li class="flex-auto">
                    <a href="{{ route('task.create') }}" class="text-center block border border-blue-500 rounded py-2 px-4 bg-blue-500 hover:bg-blue-700 text-white">추가</a>
                </li>
            </ul>
        @show
    </div>

    <div id="container" class="container mx-auto">
        @section('container')
            This is the master container.
        @show
    </div>

    <div id="footer" class="container mx-auto">
        @section('footer')
            This is the master footer.
        @show
    </div>
</body>
</html>
