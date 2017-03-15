<?php

namespace App\Http\Controllers;

use App\Article;
use App\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    /**
     * Save a new article.
     *
     * @param Request $request
     * @return RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        Article::create($request->all());
        return redirect('/');
    }

    /**
     * Show one article.
     *
     * @param $id
     * @return mixed
     */
    public function show($id)
    {
        $article = Article::findOrFail($id);
        return view('articles.show', ['article' => $article]);
    }

    /**
     * Show all user's articles.
     *
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function userArticles($id)
    {
        $user = User::find($id);
        $articles = Article::where(['user_id' => $user->id])->latest()->get();
        return view('articles.user_articles', compact('user', 'articles'));
    }

    /**
     * Like an article.
     *
     * @param Article $article
     * @return RedirectResponse
     */
    public function like(Article $article)
    {
        Auth::user()->likes()->attach($article->id);

        return back();
    }

    /**
     * Unlike an article.
     *
     * @param Article $article
     * @return RedirectResponse
     */
    public function unlike(Article $article)
    {
        Auth::user()->likes()->detach($article->id);

        return back();
    }
}
