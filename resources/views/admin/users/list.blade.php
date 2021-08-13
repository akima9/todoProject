@extends('layouts.admin')

@section('content')
    <div class="container">
        {{-- 할일이 없는 경우 --}}
        @if(count($users) === 0)
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">등록된 회원이 없습니다.</div>
                    </div>
                </div>
            </div>
        {{-- 할일이 있는 경우 --}}
        @else
            <table class="table table-hover table-striped table-bordered text-center">
                <caption>회원 목록</caption>
                <thead class="thead-dark">
                    <tr>
                        <th>번호</th>
                        <th>이름</th>
                        <th>이메일</th>
                        <th>이메일 인증일</th>
                        <th>가입일</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $users->firstItem() + $loop->index }}</td>
                            <td>{{ $user['name'] }}</td>
                            <td>{{ $user['email'] }}</td>
                            <td>{{ $user['email_verified_at'] }}</td>
                            <td>{{ $user['created_at'] }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            {{ $users->links() }}
        @endif
    </div>
@endsection
