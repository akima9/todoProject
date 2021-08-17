@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center" style="margin-bottom:1rem">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">회원검색</div>

                    <div class="card-body">
                        <form action="{{ route('admin.users') }}" method="get">
                            <div class="form-group row">
                                <div class="col-md-4">
                                    <select name="search_category" id="search_category" class="form-control">
                                        <option value="name" {{ ($search && $search['search_category'] === 'name') ? 'selected' : '' }}>이름</option>
                                        <option value="email" {{ ($search && $search['search_category'] === 'email') ? 'selected' : '' }}>이메일</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" name="search_keyword" class="form-control" value="{{ ($search) ? $search['search_keyword'] : '' }}">
                                </div>
                                <div class="col-md-2">
                                    <button type="submit" class="btn btn-primary" style="width:100%;">검색</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
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
