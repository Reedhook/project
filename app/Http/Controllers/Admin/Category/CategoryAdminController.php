<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Requests\Admin\Category\StoreRequest;
use App\Http\Requests\Admin\Category\UpdateRequest;
use App\Models\Category;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class CategoryAdminController extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
    public function index(){
        $categories= Category::all();
        return view('admin.category.index', compact('categories'));
    }
    public function create(){
        return view('admin.category.create');
    }
    public function store(StoreRequest $request){
        $data=$request->validated();
        Category::firstOrCreate($data);
        return redirect()->route('admin.category.index');
    }
    public function show(Category $category){
        return view('admin.category.show', compact('category'));
    }
    public function edit(Category $category){
        return view('admin.category.edit', compact('category'));
    }
    public function update(Category $category, UpdateRequest $request){
        $data=$request->validated();
        $category->update($data);
        return view('admin.category.show', compact('category'));
    }
    public function delete(Category $category){
        $category->delete();
        return redirect()->route('admin.category.index');
    }

}
