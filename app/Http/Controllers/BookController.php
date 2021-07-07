<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Book;
use Illuminate\Support\Facades\Auth;

class BookController extends Controller
{
    public function index(Request $request)
    {
        $books= Book::all();
        $books = DB::select('select * from books');
        return view('books',['books'=>$books]);
        $user = Auth::user();
        if(!$request->sort) {
            $sort = 'id';
        } else {
            $sort = $request->sort;
        }
        $items = Book::orderBy($sort, 'asc')->paginate(5);
        $param = ['items' => $items, 'sort' => $sort, 'user' =>$user];
        return view('index', $param);
    }



    public function add(Request $request)
    {
        $rules = [
            'txt' => 'required'
        ];
        $this->validate($request, $rules);
        $txt = $request->txt;
        $response = response()->view('book.index', ['txt' => $txt . 'をクッキーに保存しました']);
        $response->cookie('txt', $txt, 100);
        return $response;
    }



    public function create(Request $request)
    {
        $text = $request->name;
        $request->validate([
            'name' => 'required|max:255',
        ]);
        $books = new Book;
        $books->title = $request->name;
        $books->save();
        return redirect('/');
    }

    public function find(Request $request)
    {
        return view('find', ['input' => '']);
    }

    
    public function search(Request $request)
    {
        $books = Book::where('name', $request->input)->first();
        $param = [
            'input' => $request->input,
            'book' => $books
        ];
        return view('find', $param);
    }

    public function delete(Request $request)
    {
        $books = Book::find($request->title);
        return view('delete',['form'=>$books]);
    }

    public function remove( $id)
    {
        Book::find($id)->delete();
        return redirect('/');
    }

    public function getAuth(Request $request)
    {
    $param = ['message' => 'ログインして下さい。'];
    return view('book.auth', $param);
    }

    public function postAuth(Request $request)
    {
    $email = $request->email;
    $password = $request->password;
    if (Auth::attempt(['email' => $email,
            'password' => $password])) {
        $msg = 'ログインしました。（' . Auth::user()->name . '）';
    } else {
        $msg = 'ログインに失敗しました。';
    }
    return view('book.auth', ['message' => $msg]);
    }



}
