@extends('layouts.admin')

@section('content')
    <div class="container">
        {{-- 할일이 없는 경우 --}}
        @if(count($tasks) === 0)
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">등록된 할일이 없습니다.</div>
                    </div>
                </div>
            </div>
        {{-- 할일이 있는 경우 --}}
        @else
            <table class="table table-hover table-striped table-bordered text-center">
                <caption>할일 목록</caption>
                <thead class="thead-dark">
                    <tr>
                        <th>번호</th>
                        <th>제목</th>
                        <th>내용</th>
                        <th>상태</th>
                        <th>시작일</th>
                        <th>종료일</th>
                        <th>등록일</th>
                        <th>등록자</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tasks as $task)
                        <tr>
                            <td>{{ $tasks->firstItem() + $loop->index }}</td>
                            <td>{{ $task['title'] }}</td>
                            <td>{{ $task['contents'] }}</td>
                            <td>
                                @if ($task['complete'] === 'Y')
                                    완료
                                @else
                                    진행중
                                @endif
                            </td>
                            <td>{{ $task['start'] }}</td>
                            <td>{{ $task['end'] }}</td>
                            <td>{{ $task['created_at'] }}</td>
                            <td>{{ $task['email'] }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            {{ $tasks->links() }}
        @endif
    </div>
@endsection
