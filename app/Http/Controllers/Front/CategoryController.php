<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    public function index()
    {
        $categories=Category::all();
        return view('categories.index',compact('categories'));
    }
    
    public function show($uuid)
    {
        $validation=Validator::make(
            ['uuid' => $uuid],
            ['uuid'=>'required|string|exists:categories,uuid']
        );
        if($validation->fails()){
            return redirect()->back();
        }
        $category=Category::where('uuid',$uuid)->with('menus')->first();
        return view('categories.show', compact('category'));
    }

}
