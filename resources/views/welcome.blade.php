@extends('layouts.app')

@section('content')
    <div class="center jumbotron">
        <div class="text-center">
            <h3>Weight Records</h3>
            <hr class="my-4">
            <a href="{{ route('calculator.index') }}"><button type="button" class="btn btn-primary">カロリー計算</button></a><br><br>
            <a href="{{ route('records.index') }}"><button type="button" class="btn btn-primary">カロリー記録</button></a><br><br>
            <a href="{{ route('chat.index') }}"><button type="button" class="btn btn-primary">チャット</button></a><br><br>
            <hr class="my-4">
            {!! link_to_route('signup.get', 'Sign up', [], ['class' => 'btn btn-lg btn-outline-primary']) !!}
        </div>
    </div>
@endsection
