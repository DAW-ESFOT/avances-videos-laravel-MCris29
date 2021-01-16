<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Article;
use App\Http\Resources\Comment as CommentResource;
use http\Env\Response;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Self_;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Article $article
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Article $article)
    {
        return response()->json(CommentResource::collection($article->comments), 200);
    }

    /**
     * Display the specified resource.
     *
     * @param Article $article
     * @param \App\Models\Comment $comment
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Article $article,Comment $comment)
    {
        $comment=$article->comments()->where('id', $comment->id)->firstOrFail();
        return response()->json($comment, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param Article $article
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request, Article $article)
    {
        $request->validate([
            'text'=>'required|string'
        ]);
        $comment = $article->comments()->save(new Comment($request->all()));
        return response()->json($comment, 201);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Comment $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Comment $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Comment $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        //
    }
}
