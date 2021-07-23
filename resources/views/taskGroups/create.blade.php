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

    <form action="{{ route('taskGroup.store') }}" method="POST" class="w-full my-10">
        @csrf
        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full px-3">
                <label for="groupName" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                    제목
                </label>
                <input type="text" name="groupName" id="groupName" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
            </div>
        </div>
        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full px-3">
                <label for="bgColor" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                    배경색
                </label>
                <input type="color" name="bgColor" id="bgColor" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" style="height: 100px;">
            </div>
        </div>
        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full px-3">
                <label for="fontColor" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                    글자색
                </label>
                <input type="color" name="fontColor" id="fontColor" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" style="height: 100px;">
            </div>
        </div>
        <div class="text-center">
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">
                등록
            </button>
        </div>
    </form>
@endsection

<script>
    /* $(function() {
        $('#colorpicker-popup').colorpicker();
    }); */
    // document.querySelector('#bgColor').colorpicker();
</script>
