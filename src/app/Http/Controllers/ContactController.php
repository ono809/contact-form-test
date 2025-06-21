<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function confirm(Request $request)
    {
        $validated = $request->validate([
            'last_name' => 'required|string|max:255',
            'first_name' => 'required|string|max:255',
            'gender' => 'required|in:男性,女性,その他',
            'email' => 'required|email',
            'tel' => 'required|regex:/^[0-9]{3}-[0-9]{4}-[0-9]{4}$/',
            'address' => 'required|string',
            'building' => 'nullable|string',
            'category' => 'required|string',
            'content' => 'required|string|max:1000',
        ]);

        return view('confirm', ['inputs' => $validated]);
    }

    public function send(Request $request)
    {
        // 通常はDB保存やメール送信処理などを行う

        // 完了画面へ
        return view('thanks');
    }
}
