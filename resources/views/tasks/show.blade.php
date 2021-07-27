@extends('layouts.app')

@section('container')
    <div class="w-full my-10">
        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full px-3">
                <label for="taskGroup" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                    그룹
                </label>
                @if (!empty($taskGroup))
                    <input disabled type="text" name="taskGroup" id="taskGroup" value="{{ $taskGroup['groupName'] }}" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                @else
                    <input disabled type="text" name="taskGroup" id="taskGroup" value="일반" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                @endif
            </div>
        </div>
        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full px-3">
                <label for="title" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                    제목
                </label>
                <input disabled type="text" name="title" id="title" value="{{ $task['title'] }}" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
            </div>
        </div>
        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full px-3">
                <label for="contents" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                    내용
                </label>
                <textarea disabled name="contents" id="contents" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">{{ $task['contents'] }}</textarea>
            </div>
        </div>
        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full px-3">
                <label for="start" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                    시작일
                </label>
                <input disabled type="date" name="start" id="start" value="{{ $task['start'] }}" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
            </div>
        </div>
        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full px-3">
                <label for="end" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                    종료일
                </label>
                <input disabled type="date" name="end" id="end" value="{{ $task['end'] }}" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
            </div>
        </div>
        <div class="text-center">
            <a href="{{ route('task.edit', ['id' => $task['id']]) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">
                수정
            </a>
            <a href="{{ route('task.delete', ['id' => $task['id']]) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">
                삭제
            </a>
        </div>
    </div>
@endsection
