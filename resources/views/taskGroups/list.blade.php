@extends('layouts.app')

@section('content')
    <div class="container">
        @if(count($taskGroups) === 0)
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">등록된 할일 그룹이 없습니다. 할일 그룹을 추가해보세요. <a href="{{ route('taskGroup.create', ['option' => 'N']) }}">할일 그룹 추가하기</a></div>
                    </div>
                </div>
            </div>
        @else
            @foreach ($taskGroups as $taskGroup)
                <div class="block rounded py-2 px-4 hover:bg-blue-100 my-5" style="background-color: {{$taskGroup['bgColor']}}">
                    <a href="{{ route('taskGroup.show', ['id' => $taskGroup['id']]) }}">
                        <div>
                            <span class="font-extrabold text-2xl" style="color:{{$taskGroup['fontColor']}}">{{ $taskGroup['groupName'] }}</span>
                        </div>
                    </a>
                </div>
            @endforeach
        @endif
    </div>
@endsection
