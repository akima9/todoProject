@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">할일 그룹</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('taskGroup.store') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="groupName" class="col-md-4 col-form-label text-md-right">제목</label>

                                <div class="col-md-6">
                                    <input id="groupName" type="text" value="{{$taskGroup['groupName']}}" class="form-control" name="groupName" disabled>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="bgColor" class="col-md-4 col-form-label text-md-right">배경색</label>

                                <div class="col-md-6">
                                    <input id="bgColor" type="color" value="{{$taskGroup['bgColor']}}" class="form-control" name="bgColor" disabled>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="fontColor" class="col-md-4 col-form-label text-md-right">글자색</label>

                                <div class="col-md-6">
                                    <input id="fontColor" type="color" value="{{$taskGroup['fontColor']}}" class="form-control" name="fontColor" disabled>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="button" class="btn btn-primary" onclick="taskGroupEdit()">
                                        수정
                                    </button>
                                    <button type="button" class="btn btn-primary" onclick="taskGroupDelete()">
                                        삭제
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
    function taskGroupEdit(){
        self.location = "{{ route('taskGroup.edit', ['id' => $taskGroup['id']]) }}";
    }

    function taskGroupDelete(){
        self.location = "{{ route('taskGroup.delete', ['id' => $taskGroup['id']]) }}";
    }
</script>
