<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use App\Section;
use App\Product;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function getCheckbox($var, $default=0) {
        return isset($var) ? 1: $default;
    }
    public function getProdDict(){
        $dict = array();
        foreach (Section::all() as $section) {
           $dict[$section->id] = Product::where('parent_section', $section->id)->get();
        }
        return $dict;
    }
    public function getPropertyDict(){
        $dict = array();
        foreach (Product::where("have_property", 1)->get() as $product) {
           $dict[$product->url_name] = SpecialProperty::where('parent_product', $product->id)->get();
        }
        return $dict;
    }
    public function getPropertyDictById(){
        $dict = array();
        foreach (Product::all() as $product) {
           $dict[$product->id] = $product;
        }
        return $dict;
    }

}
