@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">할일</div>

                    <div class="card-body">
                        <div class="form-group row">
                            <label for="taskGroup" class="col-md-4 col-form-label text-md-right">그룹</label>

                            <div class="col-md-6">
                                @if (!empty($taskGroup))
                                    <input disabled type="text" name="taskGroup" id="taskGroup" value="{{ $taskGroup['groupName'] }}" class="form-control">
                                @else
                                    <input disabled type="text" name="taskGroup" id="taskGroup" value="일반" class="form-control">
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="title" class="col-md-4 col-form-label text-md-right">제목</label>

                            <div class="col-md-6">
                                <input disabled type="text" name="title" id="title" value="{{ $task['title'] }}" class="form-control">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="contents" class="col-md-4 col-form-label text-md-right">내용</label>

                            <div class="col-md-6">
                                <textarea disabled name="contents" id="contents" class="form-control">{{ $task['contents'] }}</textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="start" class="col-md-4 col-form-label text-md-right">시작일</label>

                            <div class="col-md-6">
                                <input disabled type="date" name="start" id="start" value="{{ $task['start'] }}" class="form-control">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="end" class="col-md-4 col-form-label text-md-right">종료일</label>

                            <div class="col-md-6">
                                <input disabled type="date" name="end" id="end" value="{{ $task['end'] }}" class="form-control">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="button" class="btn btn-primary" onclick="taskEdit()">
                                    수정
                                </button>
                                <button type="button" class="btn btn-primary" onclick="taskDelete()">
                                    삭제
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

<script>
    function taskEdit(){
        self.location = "{{ route('task.edit', ['id' => $task['id']]) }}";
    }

    function taskDelete(){
        self.location = "{{ route('task.delete', ['id' => $task['id']]) }}";
    }
</script>
