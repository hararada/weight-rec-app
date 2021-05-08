@extends('layouts.app')

@section('content')
    <div class="center jumbotron">
        <div class="text-center">
            <h3>計算機</h3>
            <hr class="my-4">
            <form action="{{ route('calculator.result') }}" method="post">
                @csrf

                <label>性別:</label>
                <input type="radio" name="gender" value="男性" checked="checked">男性
                ／
                <input type="radio" name="gender" value="女性">女性<br>

                <label>年齢:</label>
                <input type="text" name="age">歳
                <br>

                <label>身長:</label>
                <input type="text" name="height">cm
                <br>

                <label>体重:</label>
                <input type="text" name="weight">kg
                <br>

                <label>運動量:</label>
                <select name="worklevel">
                <option value="0">ほとんど運動しない</option>
                <option value="1">軽い運動</option>
                <option value="2">中程度の運動</option>
                <option value="3">激しいの運動</option>
                <option value="4">非常に激しい運動</option>
                </select>
                <br>
                <br>

                <label>目標体重:</label>
                <input type="text" name="gweight">kg
                <br>

                <label>達成までの日数:</label>
                <input type="text" name="day">日
                <br>

                <button class="btn btn-primary" type="submit">計算する</button>
            </form>
        </div>
    </div>
@endsection
