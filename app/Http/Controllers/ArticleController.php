<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Http\Resources\Article as ArticleResource;
use App\Http\Resources\ArticleCollection;

class ArticleController extends Controller
{
    public static $rules=[
        'title' => 'required|string|unique:articles|max:255',
        'body' => 'required',
    ];
    public static $messages=[
        'required' => 'El campo :attribute es obligatorio.',
    ];

    public function index()
    {
        return response()->json(new ArticleCollection(Article::paginate(5)));
    }

    public function show(Article $article)
    {
        return new ArticleResource($article);
    }

    public function store(Request $request)
    {
        $request->validate(self::$rules, self::$messages);
        $article = Article::create($request->all());
        return response()->json($article, 201);
    }

    public function update(Request $request, Article $article)
    {
        $article->update($request->all());
        return response()->json($article, 200);
    }

    public function delete(Article $article)
    {
        $article->delete();
        return response()->json(null, 204);
    }
}
