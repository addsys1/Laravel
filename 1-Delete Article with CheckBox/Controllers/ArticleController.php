<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function articles()
    {
        

        $articles = Article::orderby('id','desc')->get() ;
        return view('articles.index',['articles'=>$articles]) ;
    }

    public function multideletearticles(Request $request)
    {
        $id = $request->id ;
        foreach($id as $article_num)
        {
            $article = Article::find($article_num) ;
            $article->delete() ;

        }

        return redirect()->route('articles');
    }
}
