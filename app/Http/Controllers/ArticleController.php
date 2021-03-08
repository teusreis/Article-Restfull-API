<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Http\Requests\StoreArticleRequest;
use App\Http\Requests\UpdateArticleRequest;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $article = Article::orderBy("created_at", 'desc')->get();
        return response()->json($article);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreArticleRequest $request)
    {
        $article = Article::create([
            "title" => $request->title,
            "body" => $request->body
        ]);

        return response()->json([
            "article" => $article
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $article = Article::find($id);

        if ($article) {
            return response()->json($article);
        }

        return response()->json(["message" => "Article not found"], 404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateArticleRequest $request, $id)
    {
        $article = Article::find($id);

        if ($article) {
            $this->authorize('update', $article);

            $article->update($request->all());

            return response()->json($article);
        }

        return response()->json(["message" => "Article not found"], 404);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $article = Article::find($id);
        if ($article) {

            $this->authorize('delete', $article);

            $article->delete();
            return response()->json(status: 204);
        }

        return response()->json(["message" => "Article not found"], 404);
    }
}
