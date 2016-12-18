<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

use App\Http\Requests;
use App\Section;
use App\Product;
use App\Article;
use App\Similar;

class IndexController extends Controller
{
    public function error404(){
        return view('errors.404');
    }
    public function index(){
        $sec = Section::where('main_section', 1)->get();
        $prod = Product::where('root_product', 1)->get();
        $main_items = $sec->merge($prod);
        return view('index', ['main_items'=>$main_items]);
    }
    public function about(){
        return view('about');
    }
    public function contacts(){
        return view('contacts');
    }
    public function how_we_work(){
        $a = Article::whereUrlName("kak-mi-rabotaem")->first();
        if (!$a) return abort(404);
        return view('article', ['article'=> $a]);
    }
    public function catalog(){
        return view('catalog', [
            'sections' => Section::all(),
            'productsBySection' => $this->getProdDict(),
            'root_products' => Product::where('root_product', 1)->get()
        ]);
    }
    public function order(Request $request){
        return view('order', [
            'request' => $request->all(),
            'products' => Product::all()
        ]);
    }
    public function mail(Request $request){
        $recaptcha=$request['g-recaptcha-response'];
        if (!$recaptcha) return redirect()->back()->with('capcha', 'Подтвердите что вы не робот');
        $template = "mail_order";
        $subject = "Заказ на yourmebel.com";
        if ($request->subject == "question") {
            $subject = "Вопрос по yourmebel.com";
            $template = "mail_question";
        }
        Mail::send($template, [ 'request' => $request->all()], function($message) use ($subject) {
            $message->to(config('z_my.mailToGmail'))->subject($subject);
        });        
        return redirect()->back()->with(['response'=> "yes"]);
    }
    public function articles(){
        $articles = Article::whereUsefull(1)->get();
        return view('articles', ["articles" => $articles]);
    }
    public function section($section){
        $section = Section::where('url_name', $section)->first();
        if (!$section) return abort(404);
        $children_products = Product::where('parent_section', $section->id)->get();
        return view('section', ['section'=>$section, 'children_products'=>$children_products]);
    }
    public function product($product){
        $properties = "";
        $product = Product::whereUrl_name($product)->first();
        if (!$product) abort(404);
        $similar_ids = Similar::whereParentProduct($product->id)->pluck('similar_product');
        $similars = Product::whereIn('id', $similar_ids)->get();        
        $parent_section = Section::find($product->parent_section);
        if ($product->have_property) {
            $propertiesByProduct = $this->getPropertyDict();
            $properties = $propertiesByProduct[$product->url_name];
        }
        $path = scandir(public_path().'/img/photobig/'.$product->img_base);
        unset($path[0]);
        unset($path[1]);
        return view('product', ['product'=>$product, 'similars' => $similars, 'properties'=>$properties, 'path'=>$path, 'parent_section'=> $parent_section]);
    }
    public function article($url_name){
        $a = Article::where('url_name', $url_name)->first();
        if (!$a) return abort(404);
        return view('article', ['article'=> $a]);
    }
}
