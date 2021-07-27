@extends('layouts.app')

@section('container')
    @if ($errors->any())
        <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 my-10" role="alert">
            <p class="font-bold">경고</p>
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif

    <form action="/tasks/{{ $task['id'] }}" method="POST" class="w-full my-10">
        @csrf
        @method('PUT')
        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full px-3">
                <label for="taskGroup" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                    그룹
                </label>
                <select name="taskGroup" id="taskGroup" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                    @if (count($listTaskGroups) > 0)
                        @foreach ($listTaskGroups as $listTaskGroup)
                            <option
                                value="{{ $listTaskGroup['id'] }}"
                                @if ($listTaskGroup['id'] === $getTaskGroup['id'])
                                    selected
                                @endif
                                >{{ $listTaskGroup['groupName'] }}</option>
                        @endforeach
                    @else
                        <option value="emptyGroup">일반</option>
                    @endif

                </select>
            </div>
        </div>
        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full px-3">
                <label for="title" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                    제목
                </label>
                <input type="text" name="title" id="title" value="{{ $task['title'] }}" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
            </div>
        </div>
        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full px-3">
                <label for="contents" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                    내용
                </label>
                <textarea name="contents" id="contents" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">{{ $task['contents'] }}</textarea>
            </div>
        </div>
        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full px-3">
                <label for="start" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                    시작일
                </label>
                <input type="date" name="start" id="start" value="{{ $task['start'] }}" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
            </div>
        </div>
        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full px-3">
                <label for="end" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                    종료일
                </label>
                <input type="date" name="end" id="end" value="{{ $task['end'] }}" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
            </div>
        </div>
        <div class="text-center">
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">
                완료
            </button>
        </div>
    </form>
@endsection
