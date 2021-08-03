@extends('layouts.app')

@section('container')
    <form action="{{ route('taskGroup.store') }}" method="POST" class="w-full my-10">
        @csrf
        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full px-3">
                <label for="groupName" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                    제목
                </label>
                <input readonly type="text" name="groupName" id="groupName" value="{{$taskGroup['groupName']}}" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
            </div>
        </div>
        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full px-3">
                <label for="bgColor" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                    배경색
                </label>
                <input disabled type="color" name="bgColor" id="bgColor" value="{{$taskGroup['bgColor']}}" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" style="height: 100px;">
            </div>
        </div>
        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full px-3">
                <label for="fontColor" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                    글자색
                </label>
                <input disabled type="color" name="fontColor" id="fontColor" value="{{$taskGroup['fontColor']}}" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" style="height: 100px;">
            </div>
        </div>
        <div class="text-center">
            <a href="{{ route('taskGroup.edit', ['id' => $taskGroup['id']]) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full mr-2">
                수정하기
            </a>
            <a href="{{ route('taskGroup.delete', ['id' => $taskGroup['id']]) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">
                삭제
            </a>
        </div>
    </form>
@endsection
