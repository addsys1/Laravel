<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{

    public function articles()
    {
        $articles = Article::all() ;
        return view('articles.index', compact('articles')) ;
    }

    public function addArticle(Request $request)
    {
        $title = $request->title ;
        $content = $request->content ;
        $author = $request->author ;

        $article = new Article() ;
        $article -> title  =   $title ;
        $article -> content=   $content ;
        $article->author = $author ;

        $article->save() ;
    return redirect()->route('articles') ;
    }


    public function editArticle(Request $request)
    {
        
        $article = Article::findOrfail($request->id) ;
        $article->title = $request->title ;
        $article->content = $request->content ;
        $article->author = $request->author ;

        $article->save() ;
        return redirect()->route('articles') ;

    }


    public function deleteArticle(Request $request)
    {
        
        $article = Article::findOrFail($request->id) ;
        $article->delete() ;
        return redirect()->route('articles') ;
    }
    
}
