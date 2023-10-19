@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
    <script src="https://ajaxzip3.github.io/ajaxzip3.js" charset="UTF-8"></script>
@endsection

@section('content')
    <div class="contact">
        <h1>お問い合わせ</h1>
        <form action="/confirm/check" class="contact__form" method="post">
            @csrf
            <table class="contact__table">
                <tr class="contact__table__item">
                    <th class="contact__table__itemname">お名前<span class="span"> ※</span></th>
                    <td class="contact__table__name">
                        <div class="name">
                            <div class="sname">
                                <input type="text" class="contact__table__name__form" name="sname" value="{{ old('sname') }}">
                                <p class="contact__table__ex">例）山田</p>
                                @error('sname')
                                    <div class="error">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="fname">
                                <input type="text" class="contact__table__name__form" name="fname" value="{{ old('fname') }}">
                                <p class="contact__table__ex">例）太郎</p>
                                @error('fname')
                                    <div class="error">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </td>
                </tr>
                <tr class="contact__table__item">
                    <th class="contact__table__itemname">性別<span class="span"> ※</span></th>
                    <td class="contact__table__input">
                        <input type="radio" name="gender" value="男性" id="male" checked="checked">
                        <label for="male" class="gender__label">男性</label>
                        <input type="radio" name="gender" value="女性" id="female" class="gender__radio">
                        <label for="female" class="gender__label">女性</label>
                        <p class="contact__table__ex"></p>
                    </td>
                </tr>
                <tr class="contact__table__item">
                    <th class="contact__table__itemname">メールアドレス<span class="span"> ※</span></th>
                    <td class="contact__table__input">
                        <input type="text" class="contact__table__input__form" name="email" value="{{ old('email') }}">
                        <p class="contact__table__ex">例）test@example.com</p>
                        @error('email')
                            <div class="error">
                                {{ $message }}
                            </div>
                        @enderror
                    </td>
                </tr>
                <tr class="contact__table__item">
                    <th class="contact__table__itemname">郵便番号<span class="span"> ※</span></th>
                    <td class="contact__table__input">
                        〒
                        <input type="text" class="contact__table__input__postcode" name="postcode" value="{{ old('postcode') }}" onKeyUp="AjaxZip3.zip2addr(this,'','address','address');">
                        <p class="contact__table__ex">例）123-4567</p>
                        @error('postcode')
                            <div class="error">
                                {{ $message }}
                            </div>
                        @enderror
                    </td>
                </tr>
                <tr class="contact__table__item">
                    <th class="contact__table__itemname">住所<span class="span"> ※</span></th>
                    <td class="contact__table__input">
                        <input type="text" class="contact__table__input__form" name="address" value="{{ old('address') }}">
                        <p class="contact__table__ex">例）東京都渋谷区千駄ヶ谷1-2-3</p>
                        @error('address')
                            <div class="error">
                                {{ $message }}
                            </div>
                        @enderror
                    </td>
                </tr>
                <tr class="contact__table__item">
                    <th class="contact__table__itemname">建物名</th>
                    <td class="contact__table__input">
                        <input type="text" class="contact__table__input__form" name="building_name" value="{{ old('building_name') }}">
                        <p class="contact__table__ex">例）千駄ヶ谷マンション101</p>
                        @error('building_name')
                            <div class="error">
                                {{ $message }}
                            </div>
                        @enderror
                    </td>
                </tr>
                <tr class="contact__table__item">
                    <th class="contact__table__itemname">ご意見<span class="span"> ※</span></th>
                    <td class="contact__table__input">
                        <textarea class="contact__table__input__textarea" name="opinion" id="" cols="30" rows="10">{{ old('opinion') }}</textarea>
                        @error('opinion')
                            <div class="error">
                                {{ $message }}
                            </div>
                        @enderror
                    </td>
                </tr>
            </table>
            <button class="contact__button">
                確認
            </button>
        </form>
    </div>
@endsection

