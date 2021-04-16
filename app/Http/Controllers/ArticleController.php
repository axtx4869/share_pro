<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\ArticleRequest;
use App\Models\Article;
use App\Models\Tag;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


class ArticleController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Article::class, 'article');
    }
    /**
     * @return view
     */
    public function index()
    {
        $articles = Article::orderBy('created_at', 'DESC')->simplePaginate(6);
        $auth = Auth::user();
        $browser_title = '| ' . $auth["name"]. 'さん';
        return view('articles.index', ['articles' => $articles, 'browser_title' => $browser_title]);
    }

    /**
     * @return view
     */
    public function create()
    {
        $allTagNames = Tag::all()->map(function ($tag) {
            return ['text' => $tag->name];
        });

        return view('articles.create', [
            'allTagNames' => $allTagNames,
        ]);
    }

    /**
     * @param ArticleRequest $request
     * @param Article $article
     * @return void
     */
    public function store(ArticleRequest $request, Article $article)
    {
        $article->title = $request->title;
        $article->body = $request->body;
        $article->user_id = $request->user()->id;
        if($request->has('url')){
            $article->url = $request->url;
        }
        if ($request->hasFile('image')) {
            $request->file('image')->store('/public/images');
            $article->image = $request->file('image')->hashName();
        }
        $article->save();
        
        $request->tags->each(function ($tagName) use ($article) {
            $tag = Tag::firstOrCreate(['name' => $tagName]);
            $article->tags()->attach($tag);
        });

        return redirect()->route('articles.index')->with('flash_message', '投稿が完了しました');;
    }

    /**
     * @param Article $article
     * @return void
     */
    public function edit(Article $article)
    {
        $tagNames = $article->tags->map(function ($tag) {
            return ['text' => $tag->name];
        });

        $allTagNames = Tag::all()->map(function ($tag) {
            return ['text' => $tag->name];
        });

        return view('articles.edit', [
            'article' => $article,
            'tagNames' => $tagNames,
            'allTagNames' => $allTagNames,
        ]);
    }

    /**
     * @param ArticleRequest $request
     * @param Article $article
     * @return void
     */
    public function update(ArticleRequest $request, Article $article)
    {
        $article->fill($request->all())->save();
        $article->tags()->detach();
        $request->tags->each(function ($tagName) use ($article) {
            $tag = Tag::firstOrCreate(['name' => $tagName]);
            $article->tags()->attach($tag);
        });
        return redirect()->route('articles.index');
    }

    /**
     * @param Article $article
     * @return void
     */
    public function destroy(Article $article)
    {
        $article->delete();
        return redirect()->route('articles.index');
    }

    /**
     * @param Article $article
     * @return void
     */
    public function show(Article $article)
    {
        return view('articles.show', ['article' => $article]);
    }

    /**
     * Likesテーブルのレコードを新規作成する
     *
     * @param Request $request
     * @param Article $article
     * @return array
     */
    public function like(Request $request, Article $article) : array
    {
        $article->likes()->detach($request->user()->id); //同一ユーザの複数回のいいねを防止
        $article->likes()->attach($request->user()->id);

        return [
            'id' => $article->id,
            'countLikes' => $article->count_likes,
        ];
    }

    /**
     * Likesテーブルのレコードを削除する
     *
     * @param Request $request
     * @param Article $article
     * @return array
     */
    public function dislike(Request $request, Article $article) : array
    {
        $article->likes()->detach($request->user()->id);

        return [
            'id' => $article->id,
            'countLikes' => $article->count_likes,
        ];
    }
}
