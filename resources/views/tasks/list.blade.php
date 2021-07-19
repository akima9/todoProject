@extends('layouts.app')

@section('container')
    @foreach ($tasks as $task)
        <div class="block border border-blue-500 rounded py-2 px-4 hover:bg-blue-100 my-5">
            <a href="/tasks/{{ $task['id'] }}">
                <div>
                    <span class="font-extrabold text-2xl">{{ $task['title'] }}</span>
                    <span class="text-sm float-right">{{ $task['updated_at'] }}</span>
                </div>
                <p class="p-5">{{ $task['contents'] }}</p>
            </a>
        </div>
    @endforeach
@endsection
