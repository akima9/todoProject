@extends('layouts.app')

@section('container')
    <form action="">
        <p>
            <label for="title">title</label>
            <input type="text" id="title" name="title">
        </p>
        <p>
            <label for="contents">contents</label>
            <textarea name="contents" id="contents" cols="30" rows="10"></textarea>
        </p>
    </form>
@endsection
