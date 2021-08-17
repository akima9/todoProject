@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Email 확인</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            새 확인 링크가 이메일 주소로 전송되었습니다.
                        </div>
                    @endif

                    이메일에서 확인 링크를 클릭해주세요.<br>
                    이메일을 받지 못한 경우,
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">[이메일 재발송]</button>을 클릭해주세요.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
