@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/confirm.css') }}">
@endsection

@section('content')
    <div class="confirm">
        <h1>内容確認</h1>
        <form action="/thanks/store" class="confirm__form" method="post">
            @csrf
            <table class="confirm__table">
                <tr class="confirm__table__item">
                    <th class="confirm__table__itemname">お名前</th>
                    <td class="confirm__table__content">
                        <input type="text" class="confirm__table__content__form" name="fullname" value="{{ $opinion['sname']."    ".$opinion['fname'] }}" readonly />
                        <input type="hidden" class="confirm__table__content__form" name="sname" value="{{ $opinion['sname'] }}" readonly />
                        <input type="hidden" class="confirm__table__content__form" name="fname" value="{{ $opinion['fname'] }}" readonly />
                    </td>
                </tr>
                <tr class="confirm__table__item">
                    <th class="confirm__table__itemname">性別</th>
                    <td class="confirm__table__content">
                        <input type="text" class="confirm__table__content__form" name="gender" value="{{ $opinion['gender'] }}" readonly />
                    </td>
                </tr>
                <tr class="confirm__table__item">
                    <th class="confirm__table__itemname">メールアドレス</th>
                    <td class="confirm__table__content">
                        <input type="text" class="confirm__table__content__form" name="email" value="{{ $opinion['email'] }}" readonly />
                    </td>
                </tr>
                <tr class="confirm__table__item">
                    <th class="confirm__table__itemname">郵便番号</th>
                    <td class="confirm__table__content">
                        <input type="text" class="confirm__table__content__form" name="postcode" value="{{ $opinion['postcode'] }}" readonly />
                    </td>
                </tr>
                <tr class="confirm__table__item">
                    <th class="confirm__table__itemname">住所</th>
                    <td class="confirm__table__content">
                        <input type="text" class="confirm__table__content__form" name="address" value="{{ $opinion['address'] }}" readonly />
                    </td>
                </tr>
                <tr class="confirm__table__item">
                    <th class="confirm__table__itemname">建物名</th>
                    <td class="confirm__table__content">
                        <input type="text" class="confirm__table__content__form" name="building_name" value="{{ $opinion['building_name'] }}" readonly />
                    </td>
                </tr>
                <tr class="confirm__table__item">
                    <th class="confirm__table__itemname">ご意見</th>
                    <td class="confirm__table__content">
                        <input type="text" class="confirm__table__content__form" name="opinion" value="{{ $opinion['opinion'] }}" readonly />
                    </td>
                </tr>
            </table>
            <button class="confirm__button">
                送信
            </button>
            <button class="modify__button" type="submit" name='back' value="back">
                修正する
            </button>
        </form>
    </div>
@endsection