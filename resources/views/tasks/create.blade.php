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
                        <form method="POST" action="{{ route('task.store') }}" onsubmit="return checkForm()">
                            @csrf

                            <div class="form-group row">
                                <label for="taskGroup" class="col-md-4 col-form-label text-md-right">그룹</label>

                                <div class="col-md-3">
                                    <select name="taskGroup" id="taskGroup" class="form-control">
                                        @if (count($taskGroups) > 0)
                                            <option value="emptyGroup">일반</option>
                                            @foreach ($taskGroups as $taskGroup)
                                                <option value="{{ $taskGroup['id'] }}">{{ $taskGroup['groupName'] }}</option>
                                            @endforeach
                                        @else
                                            <option value="emptyGroup">일반</option>
                                        @endif

                                    </select>
                                </div>

                                <div class="col-md-3">
                                    <button type="button" class="btn btn-primary" onclick="taskGroupAdd()" style="width:100%">
                                        그룹 추가
                                    </button>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="title" class="col-md-4 col-form-label text-md-right">제목</label>

                                <div class="col-md-6">
                                    <input id="title" type="text" class="form-control" name="title" required autofocus>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="contents" class="col-md-4 col-form-label text-md-right">내용</label>

                                <div class="col-md-6">
                                    <textarea name="contents" id="contents" class="form-control" required></textarea>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="start" class="col-md-4 col-form-label text-md-right">시작일</label>

                                <div class="col-md-6">
                                    <input id="start" type="date" class="form-control" name="start" required autofocus>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="end" class="col-md-4 col-form-label text-md-right">종료일</label>

                                <div class="col-md-6">
                                    <input id="end" type="date" class="form-control" name="end" required autofocus>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        등록
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

<script>
    function checkForm(){
        var start = document.querySelector('#start');
        var end = document.querySelector('#end');

        if (start.value >= end.value) {
            alert("시작일이 종료일 보다 늦거나 같습니다.");
            return false;
        }

        return true;
    }

    function taskGroupAdd(){
        self.location = "{{ route('taskGroup.create', ['option' => 'Y']) }}";
    }
</script>
