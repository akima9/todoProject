@extends('layouts.app')

@section('content')
    <div class="container">
        @if ($errors->any())
            <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 my-10" role="alert">
                <p class="font-bold">경고</p>
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">할일 추가</div>

                    <div class="card-body">
                        <form method="POST" action="/tasks/{{ $task['id'] }}">
                            @csrf
                            @method('PUT')

                            <div class="form-group row">
                                <label for="taskGroup" class="col-md-4 col-form-label text-md-right">그룹</label>

                                <div class="col-md-6">
                                    <select name="taskGroup" id="taskGroup" class="form-control">
                                        @if (!empty($listTaskGroups))
                                            <option value="emptyGroup">일반</option>
                                            @foreach ($listTaskGroups as $listTaskGroup)
                                                <option
                                                    value="{{ $listTaskGroup['id'] }}"
                                                    @if (!empty($getTaskGroup))
                                                        @if ($listTaskGroup['id'] === $getTaskGroup['id'])
                                                            selected
                                                        @endif
                                                    @endif
                                                    >{{ $listTaskGroup['groupName'] }}</option>
                                            @endforeach
                                        @else
                                            <option value="emptyGroup">일반</option>
                                        @endif
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="title" class="col-md-4 col-form-label text-md-right">제목</label>

                                <div class="col-md-6">
                                    <input id="title" type="text" value="{{ $task['title'] }}" class="form-control" name="title" required autofocus>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="contents" class="col-md-4 col-form-label text-md-right">내용</label>

                                <div class="col-md-6">
                                    <textarea name="contents" id="contents" class="form-control" required>{{ $task['contents'] }}</textarea>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="start" class="col-md-4 col-form-label text-md-right">시작일</label>

                                <div class="col-md-6">
                                    <input id="start" type="date" value="{{ $task['start'] }}" class="form-control" name="start" required autofocus>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="end" class="col-md-4 col-form-label text-md-right">종료일</label>

                                <div class="col-md-6">
                                    <input id="end" type="date" value="{{ $task['end'] }}" class="form-control" name="end" required autofocus>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        완료
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
