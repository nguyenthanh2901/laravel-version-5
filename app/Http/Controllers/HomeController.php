<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Slide;
class HomeController extends FrontendController
{

    public function index()
    {
        $productSale = Product::where([
        'pro_active'=>Product::STATUS_PUBLIC
        ])->orderBy('pro_sale','DESC')->limit(4)->get();

        $productHot = Product::where([
            'pro_hot'=>Product::HOT_ON,
            'pro_active'=>Product::STATUS_PUBLIC
        ])->orderBy('id','ASC')->limit(4)->get();

        $productOldHot = Product::where([
            'pro_hot'=>Product::HOT_ON,
            'pro_active'=>Product::STATUS_PUBLIC
        ])->orderBy('id','DESC')->limit(3)->get();

        $productNew = Product::where([
            'pro_active'=>Product::STATUS_PUBLIC
        ])->orderby('id','DESC')->limit(3)->get();

        $productOld = Product::where([
            'pro_active'=>Product::STATUS_PUBLIC
        ])->orderby('id','ASC')->limit(3)->get();

        $articleNew =Article::orderby('id','DESC')->limit(3)->get();
        $product = Product::where([
            'pro_active'=>Product::STATUS_PUBLIC
        ])->orderby('id')->limit(3)->get();

        $slides = Slide::orderBy('id','ASC')->limit(1)->get();
        $banners = Slide::orderBy('id','DESC')->limit(2)->get();
        $viewData = [
            'productHot'=>$productHot,
            'productNew'=>$productNew,
            'articleNew'=>$articleNew,
            'product'=>$product,
            'productOldHot'=>$productOldHot,
            'productOld'=>$productOld,
            'productSale'=>$productSale,
            'slides'=>$slides,
            'banners'=>$banners,
        ];


        return view('home.index',$viewData);
    }
    
    public function renderProductView(Request $request)
    {
        if ($request->ajax())
        {
            $listID = $request->id;
            $products = Product::whereIn('id',$listID)->get();
            $html = view('components.product_view',compact('products'))->render();
            
            return response()->json(['data' => $html]);
        }
        
    }
}
