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
    protected function section_validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255|unique:sections',
            'translit' => 'required|max:255|unique:sections',
            'title_img' => 'required|max:255'
        ]);
    }
    protected function product_validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255|unique:products',
            'menu_name' => 'required|max:255|unique:products',
            'translit' => 'required|max:255|unique:products',
            'title_img' => 'max:255'
        ]);
    }
    protected function edit_section_validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'translit' => 'required|max:255',
            'title_img' => 'required|max:255'
        ]);
    }
    protected function edit_product_validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'menu_name' => 'required|max:255',
            'translit' => 'required|max:255',
            'title_img' => 'max:255',
            'parent_section' => 'required'
        ]);
    }
/* SHOW SECTION */
    public function index(){
        return view('admin.admin');
    }

    public function show_add_section($id=""){
        $current_sec = '';
        if ($id) $current_sec = Section::find($id);
        return view('admin.add_section', ['current_sec'=>$current_sec]);
    }

    public function show_add_product($id=""){
        $current_prod = '';
        if ($id) $current_prod = Product::find($id);
        return view('admin.add_product', ['current_prod'=>$current_prod]);
    }

    public function show_add_property($id=""){
        $current_prop = '';
        if ($id) $current_prop = SpecialProperty::find($id);
        return view('admin.add_property', ['current_property'=>$current_prop, 'products'=>Product::where("have_property", 1)->get()]);
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
        $validator = $this->section_validator($request->all());
        if ($validator->fails()) {
            return $validator->messages();
        }
        Section::create([
            'name' => $request['name'],
            'translit' => $request['translit'],
            'title_img' => $request['title_img'],
            'description' => $request['description'],
            'main_section' => $this->getCheckbox($request['main_section'])
        ]);
        return response()->json(['success'=> 'Успешно сохранено']);
    }

    public function add_product(Request $request){
        $validator = $this->product_validator($request->all());
        if ($validator->fails()) {
            return $validator->messages();
        }
        $translit = $request['translit'];
        $req_ps = $request['parent_section'];
        $parent_section = "";
        if ($req_ps) $parent_section = Section::find($req_ps)->translit.'/';
        $img_base = $parent_section.$translit;
        Product::create([
            'name' => $request['name'],
            'menu_name' => $request['menu_name'],
            'parent_section' => $request['parent_section'] ? $request['parent_section'] : 0,
            'translit' => $translit,
            'img_base' => $img_base,
            'title_img' => $request['title_img'],
            'description' => $request['description'],
            'calculator' => $this->getCheckbox($request['calculator']),
            'root_product' => $this->getCheckbox($request['root_product'])
        ]);
        return response()->json(['success'=> 'Успешно сохранено']);
    }

    public function add_property(Request $request){
        $translit = $request['translit'];
        $req_pp = $request['parent_product'];
        $parent = Product::find($req_pp);
        $parent_product = $parent->translit.'/';
        $parent->update([
            'have_property'=>1
        ]);
        $img_base = $parent_product.$translit;
        SpecialProperty::create([
            'name' => $request['name'],
            'parent_product' => $req_pp,
            'translit' => $translit,
            'img_base' => $img_base,
            'description' => $request['description']
        ]);
        return response()->json(['success'=> 'Успешно сохранено']);
    }
/* EDIT SECTION */
    public function edit_section(Request $request) {
        $validator = $this->edit_section_validator($request->all());
        if ($validator->fails()) {
            return $validator->messages();
        }
        $section = Section::find($request['id']);
        $section->update([
            'name' => $request['name'],
            'translit' => $request['translit'],
            'title_img' => $request['title_img'],
            'description' => $request['description'],
            'main_section' => $this->getCheckbox($request['main_section'])
        ]);
        $section->save();
        return response()->json(['success'=> 'Успешно изменено']);
    }

    public function edit_product(Request $request) {
        $validator = $this->edit_product_validator($request->all());
        if ($validator->fails()) {
            return $validator->messages();
        }
        $translit = $request['translit'];
        $req_ps = $request['parent_section'];
        $parent_section = "";
        if ($req_ps) $parent_section = Section::find($req_ps)->translit.'/';
        $img_base = $parent_section.$translit;
        $product = Product::find($request['id']);
        $product->update([
            'name' => $request['name'],
            'menu_name' => $request['menu_name'],
            'parent_section' => $request['parent_section'] ? $request['parent_section'] : 0,
            'translit' => $translit,
            'img_base' => $img_base,
            'title_img' => $request['title_img'],
            'description' => $request['description'],
            'calculator' => $this->getCheckbox($request['calculator']),
            'root_product' => $this->getCheckbox($request['root_product'])
        ]);
        $product->save();
        return response()->json(['success'=> 'Успешно изменено']);
    }

    public function edit_property(Request $request) {
        $translit = $request['translit'];
        $req_pp = $request['parent_product'];
        $parent_product = Product::find($req_pp)->translit.'/';
        $img_base = $parent_product.$translit;

        $property = SpecialProperty::find($request['id']);
        $property->update([
            'name' => $request['name'],
            'parent_product' => $req_pp,
            'translit' => $translit,
            'img_base' => $img_base,
            'description' => $request['description']
        ]);
        $property->save();
        return response()->json(['success'=> 'Успешно изменено']);
    }
}
