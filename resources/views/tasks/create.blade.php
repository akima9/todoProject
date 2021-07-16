@extends('layouts.app')

@section('container')
    <form action="/tasks" method="POST" class="w-full">
        @csrf
        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full px-3">
                <label for="title" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                    title
                </label>
                <input type="text" name="title" id="title" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
            </div>
        </div>
        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full px-3">
                <label for="contents" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                    contents
                </label>
                <textarea name="contents" id="contents" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"></textarea>
            </div>
        </div>
        <div class="text-center">
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">
                SAVE
            </button>
        </div>
    </form>
@endsection
