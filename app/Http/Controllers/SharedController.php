<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use View;
use App\Section;
use App\Product;
use App\SpecialProperty;

class SharedController extends Controller
{
    public function getCheckbox($var, $default=0) {
        return isset($var) ? 1: $default;
    }

    public function getProdDict(){
        $dict = array();
        foreach (Section::all() as $section) {
           $dict[$section->translit] = Product::where('parent_section', $section->id)->get();
        }
        return $dict;
    }
    public function getPropertyDict(){
        $dict = array();
        foreach (Product::where("have_property", 1)->get() as $product) {
           $dict[$product->translit] = SpecialProperty::where('parent_product', $product->id)->get();
        }
        return $dict;
    }

    public function __construct(){
        View::share ( 'sections', Section::all() );
        View::share ( 'root_products', Product::where('root_product', 1)->get() );
        View::share ( 'productsBySection', $this->getProdDict() );
    }
}
