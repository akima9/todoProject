@extends('layouts.app')

@section('content')
    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th>업데이트 일자</th>
                    <th>업데이트 내용</th>
                    <th>작업자</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($datas as $data)
                    <tr>
                        <td>{{ date('Y-m-d H:i:s', strtotime($data->commit->author->date)) }}</td>
                        <td>{{ $data->commit->message }}</td>
                        <td>{{ $data->commit->author->name }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
