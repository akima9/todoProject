@extends('layouts.app')

@section('content')
    <div class="container">
        @foreach ($taskGroups as $taskGroup)
            <div class="block rounded py-2 px-4 hover:bg-blue-100 my-5" style="background-color: {{$taskGroup['bgColor']}}">
                <a href="{{ route('taskGroup.show', ['id' => $taskGroup['id']]) }}">
                    <div>
                        <span class="font-extrabold text-2xl" style="color:{{$taskGroup['fontColor']}}">{{ $taskGroup['groupName'] }}</span>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
@endsection
