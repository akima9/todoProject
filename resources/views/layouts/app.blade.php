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
    <div id="header" class="container mx-auto">
        @section('header')
            <ul class="flex">
                <li class="flex-auto mr-2">
                    <a href="/" class="text-center block border border-blue-500 rounded py-2 px-4 bg-blue-500 hover:bg-blue-700 text-white">LIST</a>
                </li>
                <li class="flex-auto">
                    <a href="/tasks/create" class="text-center block border border-blue-500 rounded py-2 px-4 bg-blue-500 hover:bg-blue-700 text-white">ADD</a>
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
