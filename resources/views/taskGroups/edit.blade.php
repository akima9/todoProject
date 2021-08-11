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
                    <div class="card-header">할일 그룹수정</div>

                    <div class="card-body">
                        <form method="POST" action="/taskGroups/{{ $taskGroup['id'] }}">
                            @csrf
                            @method('PUT')

                            <div class="form-group row">
                                <label for="groupName" class="col-md-4 col-form-label text-md-right">제목</label>

                                <div class="col-md-6">
                                    <input id="groupName" type="text" value="{{$taskGroup['groupName']}}" class="form-control" name="groupName" required autofocus>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="bgColor" class="col-md-4 col-form-label text-md-right">배경색</label>

                                <div class="col-md-6">
                                    <input id="bgColor" type="color" value="{{$taskGroup['bgColor']}}" class="form-control" name="bgColor" required autofocus>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="fontColor" class="col-md-4 col-form-label text-md-right">글자색</label>

                                <div class="col-md-6">
                                    <input id="fontColor" type="color" value="{{$taskGroup['fontColor']}}" class="form-control" name="fontColor" required autofocus>
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
