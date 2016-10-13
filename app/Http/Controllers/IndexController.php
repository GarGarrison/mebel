<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

use App\Http\Requests;
use App\Section;
use App\Product;
use App\Article;

class IndexController extends SharedController
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
    public function catalog(){
        return view('catalog');
    }
    public function order(Request $request){
        return view('order', ['request'=>$request->all()]);
    }
    public function article($url_name){
        $a = Article::where('url_name', $url_name)->first();
        if (!$a) return abort(404);
        return view('article', ['article'=> $a]);
    }
    public function mail(Request $request){
        $template = "mail_order";
        $subject = "Заказ на yourmebel.com";
        if ($request->subject == "question") {
            $subject = "Вопрос по yourmebel.com";
            $template = "mail_question";
        }
        Mail::send($template, [ 'request' => $request->all()], function($message) use ($subject) {
            $message->to(config('z_my.mailTo'))->subject($subject);
        });
        return redirect()->back()->with(['response'=> "yes"]);
    }
    public function test(){
        return view('test');
    }
    public function section($section){
        $section = Section::where('url_name', $section)->first();
        if (!$section) return redirect('/catalog');
        $children_products = Product::where('parent_section', $section->id)->get();
        return view('section', ['title'=>$section->title, 'section'=>$section, 'children_products'=>$children_products]);
    }
    public function product($product){
        $properties = "";
        $product = Product::where('url_name', $product)->first();
        if (!$product) return redirect('/catalog');
        $parent_section = Section::find($product->parent_section);
        if ($product->have_property) {
            $propertiesByProduct = $this->getPropertyDict();
            $properties = $propertiesByProduct[$product->url_name];
        }
        $path = scandir(public_path().'/photobig/'.$product->img_base);
        unset($path[0]);
        unset($path[1]);
        return view('product', ['title'=>$product->title, 'product'=>$product, 'properties'=>$properties, 'path'=>$path, 'parent_section'=> $parent_section]);
    }
}
