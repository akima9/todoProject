@extends('layouts.app')

@section('container')
    @foreach ($taskGroups as $taskGroup)
        <div class="block border border-blue-500 rounded py-2 px-4 hover:bg-blue-100 my-5">
            <a href="{{ route('task.show', ['id' => $taskGroup['id']]) }}">
                <div>
                    <span class="font-extrabold text-2xl">{{ $taskGroup['groupName'] }}</span>
                </div>
                <p class="p-5">배경색 : {{ $taskGroup['bgColor'] }}</p>
                <p class="p-5">글자색 : {{ $taskGroup['fontColor'] }}</p>
            </a>
        </div>
    @endforeach
@endsection
