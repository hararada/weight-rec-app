@extends('layouts.app')

@section('content')
    {{-- 登録 --}}
    <div class="center jumbotron">
        <form action="{{ route('records.store') }}" method="post">
                @csrf

                <label>現在の体重:</label>
                <input type="text" name="weight">kg
                <br>

                <label>摂取カロリー:</label>
                <input type="text" name="calorie">Cal
                <br>

                <button class="btn btn-primary" type="submit">登録する</button>
        </form>
    </div>

    {{-- 一覧表 --}}
    <table class="table">
    <thead>
        <tr>
        <th scope="col">体重</th>
        <th scope="col">摂取カロリー</th>
        <th scope="col">日付</th>
        <th scope="col">削除</th>
        </tr>
    </thead>
    <tbody>
        @foreach($records as $record)
        <tr>
            <td>{{ $record->weight }}kg</td>
            <td>{{ $record->calorie }}カロリー</td>
            <th>{{ $record->created_at }}</th>
            <td>
            <form method="post" action="{{ route('records.destroy', $record->id) }}">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">削除</button>
            </form>
            </td>
        </tr>
        @endforeach
    </tbody>
    </table>

    {{ $records->links() }}

@endsection
