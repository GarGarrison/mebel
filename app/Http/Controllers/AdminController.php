<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;

use App\Http\Requests;
use App\Section;
use App\Product;
use App\SpecialProperty;

class AdminController extends SharedController
{

    public function __construct()
    {
        $this->middleware('auth');
        parent::__construct();
    }

/* SHOW SECTION */
    public function index(){
        return view('admin.admin');
    }

    public function show_add_section($id=""){
        $current = '';
        if ($id) $current = Section::find($id);
        return view('admin.add_section', ['current'=>$current]);
    }

    public function show_add_product($id=""){
        $current = '';
        if ($id) $current = Product::find($id);
        return view('admin.add_product', ['current'=>$current]);
    }

    public function show_add_property($id=""){
        $current_prop = '';
        if ($id) $current_prop = SpecialProperty::find($id);
        return view('admin.add_property', ['current_property'=>$current_prop, 'products'=>Product::all()]);
    }

    public function show_edit_section(){
        return view('admin.edit_section');
    }

    public function show_edit_product(){
        return view('admin.edit_product', ['products'=>Product::all()]);
    }

    public function show_edit_property(){
        return view('admin.edit_property', ['products'=>Product::where("have_property", 1)->get(), 'properties'=>SpecialProperty::all()]);
    }
/* ADD SECTION */
    public function add_section(Request $request){
        Section::create([
            'header' => $request['header'],
            'menu_name' => $request['menu_name'],
            'url_name' => $request['url_name'],
            'img_title' => $request['img_title'],
            'img_base' => $request['img_base'],
            'title' => $request['title'],
            'meta_keywords' => $request['meta_keywords'],
            'meta_description' => $request['meta_description'],
            'description' => $request['description'],
            'main_section' => $this->getCheckbox($request['main_section'])
        ]);
        return response()->json(['success'=> 'Успешно сохранено']);
    }

    public function add_product(Request $request){
        $img_base = $request['img_base'];
        $req_ps = $request['parent_section'];
        $parent_section = "";
        if ($req_ps) $parent_section = Section::find($req_ps)->img_base.'/';
        $img_base = $parent_section.$img_base;
        Product::create([
            'header' => $request['header'],
            'menu_name' => $request['menu_name'],
            'url_name' => $request['url_name'],
            'img_title' => $request['img_title'],
            'img_base' => $img_base,
            'title' => $request['title'],
            'meta_keywords' => $request['meta_keywords'],
            'meta_description' => $request['meta_description'],
            'description' => $request['description'],
            'parent_section' => $request['parent_section'] ? $request['parent_section'] : 0,
            'calculator' => $this->getCheckbox($request['calculator']),
            'root_product' => $this->getCheckbox($request['root_product'])
        ]);
        return response()->json(['success'=> 'Успешно сохранено']);
    }

    public function add_property(Request $request){
        $req_pp = $request['parent_product'];
        $parent = Product::find($req_pp);
        $parent_product = $parent->img_base.'/';
        $parent->update([
            'have_property'=>1
        ]);
        $img = $parent_product.$request['img'];
        SpecialProperty::create([
            'name' => $request['name'],
            'parent_product' => $req_pp,
            'img' => $img,
            'description' => $request['description']
        ]);
        return response()->json(['success'=> 'Успешно сохранено']);
    }
/* EDIT SECTION */
    public function edit_section(Request $request) {
        $section = Section::find($request['id']);
        $img_base = $request['img_base'];
        if ($section->img_base != $img_base) {
            foreach (Product::where('parent_section', $section->id)->get() as $product) {
                $new_base = str_replace($section->img_base.'/', $img_base.'/', $product->img_base);
                $product->update([
                    'img_base' => $new_base
                ]);
                $product->save();
            }
        }
        $section->update([
            'header' => $request['header'],
            'menu_name' => $request['menu_name'],
            'url_name' => $request['url_name'],
            'img_title' => $request['img_title'],
            'img_base' => $img_base,
            'title' => $request['title'],
            'meta_keywords' => $request['meta_keywords'],
            'meta_description' => $request['meta_description'],
            'description' => $request['description'],
            'main_section' => $this->getCheckbox($request['main_section'])
        ]);
        $section->save();
        return response()->json(['success'=> 'Успешно изменено']);
    }

    public function edit_product(Request $request) {
        $img_base = $request['img_base'];
        $req_ps = $request['parent_section'];
        $parent_section = "";
        if ($req_ps) $parent_section = Section::find($req_ps)->img_base.'/';
        if (count(explode('/', $img_base)) == 1) $img_base = $parent_section.$img_base;
        $product = Product::find($request['id']);
        $product->update([
            'header' => $request['header'],
            'menu_name' => $request['menu_name'],
            'url_name' => $request['url_name'],
            'img_title' => $request['img_title'],
            'img_base' => $img_base,
            'title' => $request['title'],
            'meta_keywords' => $request['meta_keywords'],
            'meta_description' => $request['meta_description'],
            'description' => $request['description'],
            'parent_section' => $request['parent_section'] ? $request['parent_section'] : 0,
            'calculator' => $this->getCheckbox($request['calculator']),
            'root_product' => $this->getCheckbox($request['root_product'])
        ]);
        $product->save();
        return response()->json(['success'=> 'Успешно изменено']);
    }

    public function edit_property(Request $request) {
        $property = SpecialProperty::find($request['id']);
        $req_pp = $request['parent_product'];
        $parent = Product::find($req_pp);
        if ($property->parent_product != $req_pp) {
            $old_prod = Product::find($property->parent_product);
            $old_prod->update(['have_property'=> 0]);
            $parent->update(['have_property'=> 1]);
        }
        $parent_product = $parent->img_base.'/';
        $img = $request['img'];
        if (count(explode('/', $img)) <= 1 ) $img = $parent_product.$request['img'];
        $property->update([
            'name' => $request['name'],
            'parent_product' => $req_pp,
            'img' => $img,
            'description' => $request['description']
        ]);
        $property->save();
        return response()->json(['success'=> 'Успешно изменено']);
    }
}
