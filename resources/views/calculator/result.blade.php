@extends('layouts.app')

@section('content')
<div class="center jumbotron">
    <div class="text-center">
        <h3>計算結果</h3>
        <hr class="my-4">
        <p>
            性別: {{ $gender }} <br>
            年齢: {{ $age }}歳 <br>
            身長: {{ $height }}cm <br>
            体重: {{ $weight }}kg <br>
            運動量: {{ $worklevelstr }} <br>
        </p>
        <p>-----------------------</p>
        <p>
            基礎代謝: {{ $bmr }}kcal
        </p>
        <p class="green">
            消費カロリー: {{ $tdee }}kcal
        </p>
        <p>-----------------------</p>
        <p>
            目標体重: {{ $gweight }}kg
        </p>
        <p>
            達成までの日数: {{ $day }}日
        </p>
        <p class="green">
            1日あたりの摂取カロリー: {{ $calperday }}kcal
        </p>
    </div>
</div>
@endsection
