@extends('layouts.admin')

@section('content')
    <div class="container">
        {{-- 할일이 없는 경우 --}}
        @if(count($taskGroups) === 0)
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">등록된 할일 그룹이 없습니다.</div>
                    </div>
                </div>
            </div>
        {{-- 할일이 있는 경우 --}}
        @else
            <table class="table table-hover table-striped table-bordered text-center">
                <caption>할일 그룹 목록</caption>
                <thead class="thead-dark">
                    <tr>
                        <th>번호</th>
                        <th>제목</th>
                        <th>배경색</th>
                        <th>글자색</th>
                        <th>등록일</th>
                        <th>등록자</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($taskGroups as $taskGroup)
                        <tr>
                            <td>{{ $taskGroups->firstItem() + $loop->index }}</td>
                            <td>{{ $taskGroup['groupName'] }}</td>
                            <td style="background: {{ $taskGroup['bgColor'] }}"></td>
                            <td style="background: {{ $taskGroup['fontColor'] }}"></td>
                            <td>{{ $taskGroup['created_at'] }}</td>
                            <td>{{ $taskGroup['email'] }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            {{ $taskGroups->links() }}
        @endif
    </div>
@endsection
