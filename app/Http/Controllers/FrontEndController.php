<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class FrontendController extends Controller
{
    public function __construct()
    {
        $categories = Category::where('c_active',Category::STATUS_PUBLIC)->get();
        $article = Article::orderBy('a_name','DESC')->simplePaginate(5);
        $viewData= [
            'categories'=>$categories,
            'article'=>$article
            ];
        View::share($viewData);
    }
}
