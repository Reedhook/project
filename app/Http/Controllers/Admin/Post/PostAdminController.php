<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Requests\Admin\Post\StoreRequest;
use App\Http\Requests\Admin\Post\UpdateRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class PostAdminController extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
    public function index(){
        $posts= Post::all();

        return view('admin.post.index', compact('posts'));
    }
    public function create(){
        $categories=Category::all();
        $tags=Tag::all();
        return view('admin.post.create', compact( 'categories', 'tags'));
    }
    public function store(StoreRequest $request){
        $data=$request->validated();
        Post::firstOrCreate($data);
        Storage::put('/images','image');
        return redirect()->route('admin.post.index');
    }
    public function show(Post $post){
        return view('admin.post.show', compact('post'));
    }
    public function edit(Post $post){
        return view('admin.post.edit', compact('post'));
    }
    public function update(Post $post, UpdateRequest $request){
        $data=$request->validated();
        $post->update($data);
        return view('admin.post.show', compact('post'));
    }
    public function delete(Post $post){
        $post->delete();
        return redirect()->route('admin.post.index');
    }

}
