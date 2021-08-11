@extends('layouts.app')

@section('content')
    @foreach ($tasks as $task)
        <a href="{{ route('task.show', ['id' => $task['id']]) }}">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
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
@endsection
