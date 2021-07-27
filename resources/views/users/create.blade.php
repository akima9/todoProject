@extends('layouts.app')

@section('container')
    @if ($errors->any())
        <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 my-10" role="alert">
            <p class="font-bold">경고</p>
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif

    <form action="{{ route('user.store') }}" method="POST" class="w-full my-10" onsubmit="return checkForm()">
        @csrf
        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full px-3">
                <label for="userId" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                    아이디
                </label>
                <input type="text" name="userId" id="userId" onkeyup="checkUserId(this)" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
            </div>
        </div>
        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full px-3">
                <label for="contents" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                    비밀번호
                </label>
                <input type="password" name="userPw" id="userPw" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
            </div>
        </div>
        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full px-3">
                <label for="contents" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                    비밀번호 확인
                </label>
                <input type="password" name="reUserPw" id="reUserPw" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
            </div>
        </div>
        <div class="text-center">
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">
                등록
            </button>
        </div>
    </form>
@endsection

<script>
    function checkUserId(box){
        onlyAlphaAndNum(box);
    }

    // 알파벳 및 숫자만 허용
    function onlyAlphaAndNum(box){
        var val = box.value;
        var regex = /[^0-9|a-z|A-Z]/g;
        var result = val.replace(regex, '');
        box.value = result;
    }

    function checkForm(){
        var userId = document.querySelector('#userId');
        var userPw = document.querySelector('#userPw');
        var reUserPw = document.querySelector('#reUserPw');

        if (!userId.value) {
            alert('아이디를 입력해주세요.');
            userId.focus();
            return false;
        }//end if

        if (!userPw.value) {
            alert('비밀번호를 입력해주세요.');
            userPw.focus();
            return false;
        }//end if

        if (!reUserPw.value) {
            alert('비밀번호를 확인해주세요.');
            reUserPw.focus();
            return false;
        }//end if

        if (userPw.value !== reUserPw.value) {
            alert('비밀번호를 동일하게 입력해주세요.');
            reUserPw.focus();
            return false;
        }

        return true;

    }
</script>
