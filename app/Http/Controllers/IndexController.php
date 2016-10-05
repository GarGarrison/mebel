<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

use App\Http\Requests;
use App\Section;
use App\Product;

class IndexController extends SharedController
{
    public function index(){
        $sec = Section::where('main_section', 1)->get();
        $prod = Product::where('root_product', 1)->get();
        $main_items = $sec->merge($prod);
        return view('index', ['main_items'=>$main_items]);
    }
    public function about(){
        return view('about');
    }
    public function error404(){
        return view('errors.404');
    }
    public function contacts(){
        return view('contacts');
    }
    public function catalog(){
        return view('catalog');
    }
    public function mail(Request $request){
        Mail::send('mail', [ 'request' => $request->all()], function($message){
            $message->to(config('z_my.mailTo'))->subject('Вопрос по Yourmebel');
        });
        return view('contacts', ['response'=> "yes"]);
    }
    public function test(){
        return view('test');
    }
    public function section($section){
        $section = Section::where('translit', $section)->first();
        $products = Product::where('parent_section', $section->id)->get();
        return view('section', ['title'=>$section->title, 'section'=>$section, 'products'=>$products]);
    }
    public function product($product){
        $properties = "";
        $product = Product::where('translit', $product)->first();
        $parent_section = Section::find($product->parent_section);
        if ($product->have_property) {
            $propertiesByProduct = $this->getPropertyDict();
            $properties = $propertiesByProduct[$product->translit];
        }
        $path = scandir(public_path().'/photobig/'.$product->img_base);
        unset($path[0]);
        unset($path[1]);
        return view('product', ['title'=>$product->title, 'product'=>$product, 'properties'=>$properties, 'path'=>$path, 'parent_section'=> $parent_section]);
    }
}
