@extends('layouts.app')

@section('content')
    @guest
        로그인전
    @else
        {{-- 할일이 없는 경우 --}}
        @if(count($tasks) === 0)
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">등록된 할일이 없습니다. 할일을 추가해보세요. <a href="{{ route('task.create') }}">할일 추가하기</a></div>
                    </div>
                </div>
            </div>
        {{-- 할일이 있는 경우 --}}
        @else
            @foreach ($tasks as $task)
                <a href="{{ route('task.show', ['id' => $task['id']]) }}">
                    <div class="row justify-content-center" style="margin-bottom:1rem">
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-header">
                                    @if ($task['complete'] === 'Y')
                                        <span>[완료]</span>
                                    @else
                                        <span>[진행중]</span>
                                    @endif
                                    <span>{{ $task['title'] }}</span>
                                    <span class="float-right">{{ $task['start'] }} ~ {{ $task['end'] }}</span>
                                </div>

                                <div class="card-body">
                                    <div class="form-group row">
                                        {{ $task['contents'] }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            @endforeach
        @endif
    @endguest
@endsection
