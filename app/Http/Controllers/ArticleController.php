<?php

namespace App\Http\Controllers;

use App\Article;
use App\Category;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::orderBy('created_at', 'DESC')->get();
        $cat = Category::all();
        
        // if (Auth::check()) {
        //     if (Auth::user()->role == 'User') {
        //         $articles = Article::where('user_id', Auth::user()->id)->orderBy('created_at', 'DESC')->get();
        //     }
        // }
        // else {
        //     $articles = Article::orderBy('created_at', 'DESC')->get();
        // }
        
        return view('home', compact('articles', 'cat'));
    }

    public function show($id)
    {
        $art = Article::findOrFail($id);

        return view('article.detail', compact('art'));
    }

    public function perCat($id)
    {
        $cat = Category::find($id);

        return view('article.categorize', compact('cat'));
    }

    public function create()
    {
        $cat = Category::all();
        return view('article.create', compact('cat'));
    }

    public function store(Request $request)
    {
        $data = $this->validate($request, [
            'title' => 'required',
            'category_id' => 'required|numeric|gt:0',
            'image' => 'required|file|image',
            'description' => 'required'
        ]);

        $image_path = $request->image->store('images', 'public');

        Article::create(array_merge(
            $data,
            ['image'  => $image_path],
            ['user_id' => auth()->user()->id]
        ));

        return redirect('home');
    }

    public function blog()
    {
        $user = User::find(Auth::user()->id);
        $art = Article::where('user_id', auth()->user()->id)->paginate(5);

        return view('article.blog', compact('user', 'art'));
    }

    public function allblog()
    {
        $art = DB::table('articles')->orderBy('created_at', 'DESC')->paginate(5);

        return view('article.adminBlog', compact('art'));
    }

    public function destroy($id)
    {
        $art = Article::findOrFail($id);
        Storage::delete('public/'.$art->image);
        $art->delete();

        if (auth()->check()) {
            if (auth()->user()->role  == 'Admin') {
                return redirect()->route('allblog');
            }
        }
        return redirect()->route('blog');
    }
}
