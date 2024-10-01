<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Category;
use App\Http\Requests\ContactRequest;
use Illuminate\Support\Facades\DB;

class ContactController extends Controller
{
        public function index()
        {
                $categories = DB::table('categories')->get(); // カテゴリデータを取得
                
                return view('index', compact('categories')); // ビューにデータを渡す
        }

        public function confirm(ContactRequest $request)
        {
                $contact = $request->only(['first_name','last_name','gender', 'email', 'tel_1','tel_2','tel_3','address','building', 'content','detail','category_id']);
                $contact['tel'] = $request->input('tel_1') . '-' . $request->input('tel_2') . '-' . $request->input('tel_3');
                $categories = Category::all();
                $category = Category::findOrFail($contact['category_id']);
                $contact['category'] = $category->content;

                session(['contact' => $contact]);
                       
                return view('confirm', compact('contact', 'categories'));              
        }  
        
        public function thanks()
        {
                $contact = session('contact');
                // $contact = $request->only(['first_name','last_name','gender', 'email', 'tel_1','tel_2','tel_3','address','building', 'content','detail','category_id']);
                Contact::create($contact);
                return view('thanks');
        }
        
        
}
