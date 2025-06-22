<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\StreamedResponse;


class AdminController extends Controller
{
    public function index(Request $request)
    {
        $query = Contact::query();

        // 名前（部分一致・姓・名・フルネーム対応）
        if ($request->filled('name')) {
            $name = $request->input('name');
            $query->where(function ($q) use ($name) {
                $q->where('name', 'like', "%{$name}%");
            });
        }

        // 性別
        if ($request->filled('gender') && $request->gender !== '全て') {
            $query->where('gender', $request->gender);
        }

        // お問い合わせの種類
        if ($request->filled('category')) {
            $query->where('category', $request->category);
        }

        // 日付
        if ($request->filled('date')) {
            $query->whereDate('created_at', $request->date);
        }

        $contacts = $query->orderBy('created_at', 'desc')->paginate(7)->withQueryString();

        return view('admin.index', compact('contacts'));
    }

    public function export(Request $request)
    {
        $query = Contact::query();

        if ($request->filled('name')) {
            $query->where('name', 'like', "%{$request->name}%");
        }

        if ($request->filled('gender') && $request->gender !== '全て') {
            $query->where('gender', $request->gender);
        }

        if ($request->filled('category')) {
            $query->where('category', $request->category);
        }

        if ($request->filled('date')) {
            $query->whereDate('created_at', $request->date);
        }

        $contacts = $query->get();

        $csvHeader = ['お名前', '性別', 'メールアドレス', 'お問い合わせの種類', '内容', '登録日時'];

        $callback = function () use ($contacts, $csvHeader) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $csvHeader);

            foreach ($contacts as $contact) {
                fputcsv($file, [
                    $contact->name,
                    $contact->gender,
                    $contact->email,
                    $contact->category,
                    $contact->message,
                    $contact->created_at->format('Y-m-d H:i:s'),
                ]);
            }

            fclose($file);
        };

        return new StreamedResponse($callback, 200, [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="contacts.csv"',
        ]);
    }

    public function destroy($id)
    {
        Contact::findOrFail($id)->delete();
        return redirect()->route('admin.index')->with('success', '削除しました');
    }
}
