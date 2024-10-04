<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class AdminController extends Controller
{
        public function index(Request $request)
{
    // リセットボタンが押された場合
    if ($request->has('reset')) {
        return redirect()->route('admin.index')->withInput(); // リダイレクトして初期状態に戻す
    }

    $query = Contact::query();
    
    // 検索条件を適用
    if (!empty($request->name)) {
        $query->where('first_name', 'like', '%' . $request->name . '%')
              ->orWhere('last_name', 'like', '%' . $request->name . '%');
    }
    
    if (!empty($request->email)) {
        $query->where('email', 'like', '%' . $request->email . '%');
    }

    if (!empty($request->gender)) {
        $query->where('gender', $request->gender);
    }

    if (!empty($request->inquiryType)) {
        $query->whereHas('category', function ($q) use ($request) {
            $q->where('content', 'like', '%' . $request->inquiryType . '%');
        });
    }

    if (!empty($request->date)) {
        $query->whereDate('created_at', $request->date);
    }

    // ページネーションを取得
    // $contacts = Contact::Paginate(7);
    $contacts = $query->paginate(7);    
    $selectedContact = null;

    return view('admin', compact('contacts', 'selectedContact'));
}

    public function show($id)
    {
        $selectedContact = Contact::findOrFail($id);
       
        $contacts = Contact::filter(request()->all())->paginate(7); 
        return view('admin', compact('contacts','selectedContact'));
    }


    public function destroy($id)
    {
        $contact = Contact::findOrFail($id);
        $contact->delete();

        return redirect()->route('admin.index');
    }
}
