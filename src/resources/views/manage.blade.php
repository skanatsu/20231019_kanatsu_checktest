@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/manage.css') }}">
@endsection

@section('content')
    <div class="manage">
        <h1>管理システム</h1>
        <form action="/manage/search" class="search" method="get">
            @csrf
            <div class="search__form">
                <div class="search__form__input">
                    <div class="namegender">
                        <div class="name">
                            <label for="fullname" class="search__table__itemname">お名前</label>
                            <input type="text" id="fullname" class="search__table__content__form adjust__fullname" name="fullname" value="{{ session('search.fullname') }}">
                        </div>
                        <div class="gender">
                            <label class="search__table__itemname">性別</label>
                            <div class="search__table__content">
                                <input type="radio" id="both" class="gender__radio" name="gender" value="0" {{ session('search.gender') == 0 ? 'checked' : '' }}>
                                <label for="both" class="gender__label">全て</label>
                                <input type="radio" id="male" class="gender__radio" name="gender" value="1" {{ session('search.gender') == 1 ? 'checked' : '' }}>
                                <label for="male" class="gender__label">男性</label>
                                <input type="radio" id="female" class="gender__radio" name="gender" value="2" {{ session('search.gender') == 2 ? 'checked' : '' }}>
                                <label for="female" class="gender__label">女性</label>
                            </div>
                        </div>
                    </div>
                    <div class="search__table__item">
                        <label class="search__table__itemname" for="date_from">登録日</label>
                        <input type="date" id="date_from" class="search__date__from__form adjust__date_from" name="date_from" value="{{ session('search.date_from') }}">〜
                        <input type="date" class="search__date__to__form" name="date_to" value="{{ session('search.date_to') }}">
                    </div>
                    <div class="search__table__item">
                        <label class="search__table__itemname" for="email">メールアドレス</label>
                        <input type="text" id="email" class="search__table__content__form" name="email" value="{{ session('search.email') }}">
                    </div>
                </div>
                <button class="search__button">
                    検索
                </button>
                <button type="submit" class="search__reset" name="reset">
                    リセット
                </button>
            </div>
        </form>
        <div class="paginate">
            <div class="paginate__count">
                全{{ $opinions->total() }}件中
                {{ $opinions->firstItem() }}〜{{ $opinions->lastItem() }} 件
            </div>
            <div class="paginate__page">
                {{ $opinions->links('vendor.pagination.custom-pagination') }}
            </div>
        </div>
        <form action="/manage/delete" class="result" method="post">
            @method('DELETE')
            @csrf
            <div class="result__form">
                <table class="result__table">
                    <thead>
                        <tr class="result__item">
                            <th class="result__itemname">ID</th>
                            <th class="result__itemname">お名前</th>
                            <th class="result__itemname">性別</th>
                            <th class="result__itemname">メールアドレス</th>
                            <th class="result__itemname">ご意見</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($opinions as $opinion)
                            <tr class="result__item">
                                <td class="result_content">{{ $opinion['id'] }}</td>
                                <td class="result_content">{{ $opinion['fullname'] }}</td>
                                    @if($opinion['gender'] == 1)
                                        <td class="result_content">男性</td>
                                    @else
                                        <td class="result_content">女性</td>
                                    @endif
                                <td class="result_content">{{ $opinion['email'] }}</td>
                                <td class="result_content_opinion">{{ $opinion['opinion'] }}</td>
                                <td class="result_content">
                                    <button class="result__delete" name="id" value="{{ $opinion['id'] }}">削除</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </form>
    </div>
@endsection