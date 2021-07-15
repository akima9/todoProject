<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>TO-DO App</title>
</head>
<body>
    <div id="header">
        @section('header')
            <ul>
                <li><a href="/">LIST</a></li>
                <li><a href="/tasks/create">ADD</a></li>
            </ul>
        @show
    </div>

    <div id="container">
        @section('container')
            This is the master container.
        @show
    </div>

    <div id="footer">
        @section('footer')
            This is the master footer.
        @show
    </div>
</body>
</html>
