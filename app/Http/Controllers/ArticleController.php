<?php

namespace App\Http\Controllers;

use App\Article;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    /**
     * Save a new article.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
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
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     * @internal param Article $article
     */
    public function likeArticle($id)
    {
        Auth::user()->likes()->attach($id);

        return back();
    }

    /**
     * Unlike an article.
     *
     * @param Article $article
     * @return \Illuminate\Http\RedirectResponse
     */
    public function unlikeArticle(Article $article)
    {
        Auth::user()->likes()->detach($article->id);

        return back();
    }
}
