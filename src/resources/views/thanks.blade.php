@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/thanks.css') }}">
@endsection

@section('content')
    <div class="thanks">
        <p class="thanks__message">
            ご意見いただきありがとうございました。
        </p>
        <button class="thanks__button">
            トップページへ
        </button>
    </div>
@endsection