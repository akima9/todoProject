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

    <form action="{{ route('user.store') }}" method="POST" class="w-full my-10">
        @csrf
        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full px-3">
                <label for="userId" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                    아이디
                </label>
                <input type="text" name="userId" id="userId" onkeypress="checkUserId(this)" onkeyup="checkUserId(this)" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
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
        var val = box.value;
        var regex = /^[a-z|A-Z|0-9]+$/gi;
        // console.log(box.value);
        // const regex = /^[a-z|A-Z|0-9|]+$/;
        // if (!regex.test(val)) {
        //     console.log(val.replace('/[^0-9]/gi', ''));
        // }
        console.log(regex);
        // box.value =
        var test = val.replace('/^[0-9]/g', '1');
        console.log(test);

        // val=obj.value;
        // re=/[^0-9]/gi;
        // obj.value=val.replace(re,"");
    }
</script>
