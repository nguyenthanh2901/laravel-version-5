<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends FrontendController
{
    public function __construct()
    {
        parent::__construct();
    }
    public function getListArticle(Request $request)
    {
        $articles = Article::orderBy('id','DESC')->simplePaginate(3);
        $articleNew = Article::orderBy('a_name','DESC')->simplePaginate(3);
        $viewData=([
           'articles'=>$articles,
            'articleNew'=>$articleNew,
        ]);
        return view('article.index',$viewData);
    }
    public function getDetailArticle(Request $request)
    {
        $arrayUrl = (preg_split("/(-)/i",$request->segment(2)));

        $id = array_pop($arrayUrl);

        if ($id)
        {
            $articleDetail = Article::find($id);
            $articles = Article::orderBy("id","DESC")->paginate(7);
            $articleNew = Article::orderBy('a_name','DESC')->simplePaginate(8);

            $viewData = [
                'articles' => $articles,
                'articleDetail' => $articleDetail,
                'articleNew' => $articleNew
            ];

            return view('article.detail',$viewData);
        }

        return redirect('/');
    }
}
