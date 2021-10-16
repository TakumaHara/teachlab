<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $articles=Article::where('user_id', '=', \Auth::id())->whereNull('deleted_at')->orderBy('id', 'DESC')->get();
        return view('home', compact('articles'));
    }
    public function store(Request $request)
    {
        $posts = $request->all();
        Article::insert(['content'=> $posts['content'], 'user_id'=> \Auth::id()]);
        return redirect(route('home'));
    }
    public function edit($id)
    {
        $edit_article=Article::where('articles.user_id', '=', \Auth::id())
        ->where('articles.id', '=', $id)
        ->whereNull('articles.deleted_at')
        ->get();

        return view('edit', compact('edit_article'));
    }
    public function update(Request $request)
    {
        $posts = $request->all();
        Article::where('id', $posts['article_id'])->update(['content' => $posts['content'], 'user_id'=>\Auth::id()]);
        return redirect(route('home'));
    }
    public function destroy(Request $request)
    {
        return redirect(route('home'));
    }
}
