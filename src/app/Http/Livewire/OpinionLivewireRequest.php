<?php

namespace App\Http\Livewire;

use Livewire\Component;

class OpinionLivewireRequest extends Component
{
    public $sname;
    public $fname;
    public $gender;
    public $email;
    public $postcode;
    public $address;
    public $building_name;
    public $opinion;

    public $listeners = ['submitForm'];

    public function render(){
        return view('livewire.opinion');
    }

    public function rules(){
        return [
        'sname' => ['required', 'string', 'max:255'],
        'fname' => ['required', 'string', 'max:255'],
        'gender' => ['required', 'string', 'in:男性,女性'],
        'email' => ['required', 'string', 'email', 'max:255'],
        'postcode' => ['required', 'string', 'between:8,8'],
        'address' => ['required', 'string', 'max:255'],
        'building_name' => ['nullable', 'string', 'max:255'],
        'opinion' => ['required', 'string', 'max:120'],
        ];
    }

    public function messages(){
        return [
            'sname.required' => '姓を入力してください',
            'sname.string' => '姓を文字列で入力してください',
            'sname.max' => '姓を255文字以下で入力してください',
            'fname.required' => '名を入力してください',
            'fname.string' => '名を文字列で入力してください',
            'fname.max' => '名を255文字以下で入力してください',
            'email.required' => 'メールアドレスを入力してください',
            'email.string' => 'メールアドレスを文字列で入力してください',
            'email.email' => '有効なメールアドレス形式を入力してください',
            'email.max' => 'メールアドレスを255文字以下で入力してください',
            'postcode.required' => '郵便番号を入力してください',
            'postcode.string' => '郵便番号を数字とハイフンで入力してください',
            'postcode.between' => '郵便番号を数字とハイフン含め8桁で入力してください',
            'address.required' => '住所を入力してください',
            'address.string' => '住所を文字列で入力してください',
            'address.max' => '住所を255文字以下で入力してください',
            'building_name.max' => '建物名を255文字以下で入力してください',
            'opinion.required' => 'ご意見を入力してください',
            'opinion.string' => 'ご意見を文字列で入力してください',
            'opinion.max' => 'ご意見を120文字以下で入力してください',
        ];
    }

    public function updated($field)
    {
        $this->validateOnly($field, [
            'sname' => ['required', 'string', 'max:255'],
            'fname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'postcode' => ['required', 'string', 'between:8,8'],
            'address' => ['required', 'string', 'max:255'],
            'building_name' => ['max:255'],
            'opinion' => ['required', 'string', 'max:120'],
        ]);
    }

    public function submitForm(){
        $validatedData = $this->validate([
            'sname' => ['required', 'string', 'max:255'],
            'fname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'postcode' => ['required', 'string', 'between:8,8'],
            'address' => ['required', 'string', 'max:255'],
            'building_name' => ['max:255'],
            'opinion' => ['required', 'string', 'max:120'],
        ]);
        return redirect('/confirm/check');
    }
}