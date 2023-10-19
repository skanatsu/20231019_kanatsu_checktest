<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Opinion;
use App\Http\Requests\OpinionRequest;
use Carbon\Carbon;

class OpinionController extends Controller
{
    public function index(){
        return view('index');
    }

    public function confirm(){
        return view('confirm');
    }

    public function thanks(){
        return view('thanks');
    }

    public function manage(){
        $opinions = Opinion::Paginate(10);
        return view('manage', compact('opinions'));
    }

    public function check(OpinionRequest $request){
        $opinion = $request->all();
        return view('confirm', compact('opinion'));
    }

    public function store(Request $request){
        $opinion = $request->all();

        if($request->input('back') == 'back'){
            return redirect('/')->withInput();
        }

        if($opinion['gender'] == '男性'){
            $opinion['gender'] = 1;
        }else{
            $opinion['gender'] = 2;
        }

        Opinion::create($opinion);
        return view('thanks');
    }

    public function search(Request $request){
        if ($request->has('reset')) {
            $request->session()->forget('search');
            return redirect('/manage');
        }

        $request->session()->put('search.fullname', $request->input('fullname'));
        $request->session()->put('search.gender', $request->input('gender'));
        $request->session()->put('search.date_from', $request->input('date_from'));
        $request->session()->put('search.date_to', $request->input('date_to'));
        $request->session()->put('search.email', $request->input('email'));

        $opinion = $request->all();
        $gender = $request->input('gender', 0);

        $query = Opinion::NameSearch($request->fullname)
            ->EmailSearch($request->email);

        if ($opinion['gender'] == 0) {
            $query->DateFromSearch($request->date_from)
            ->DateToSearch($request->date_to);
        } elseif ($opinion['gender'] == 1 || $opinion['gender'] == 2) {
            $query->GenderSearch($request->gender)
            ->DateFromSearch($request->date_from)
            ->DateToSearch($request->date_to);
        }

        $opinions = $query->paginate(10)->appends([
        'fullname' => $request->fullname,
        'gender' => $request->gender,
        'date_from' => $request->date_from,
        'date_to' => $request->date_to,
        'email' => $request->email
        ]);

        return view('manage', compact('opinions'));
    }

    public function destroy(Request $request){
        Opinion::find($request->id)->delete();
        return redirect('manage');
    }
}