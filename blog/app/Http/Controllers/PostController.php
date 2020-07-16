<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PostController extends Controller
{
    //

    public function index(){

//        $posts = auth()->user()->posts;
        $posts = Post::all();
        return view('admin.posts.index',['posts'=>$posts]);
    }


    public function show(post $post){

//        dd($id);
        return view('blog-post',['post'=>$post]);
    }

    public function create(){

        return view('admin.posts.create');
    }

    public function store(){

        $this->authorize('create', Post::class);

        $inputs = request()->validate([
                'title'=> 'required|min:2|max:255',
                'post_image'=> 'file',
                'body'=>'required'
        ]);

        if(request('post_image')){
            $inputs['post_image'] = request('post_image')->store('images');
        }

        auth()->user()->posts()->create($inputs);

        session::flash('message-success','Post created successfully.');

        return redirect()->route('post.index');
    }

    public function edit(post $post){

        $this->authorize('view',$post);

        return view('admin.posts.edit',['post'=>$post]);
    }


    public function update(Post $post){

        $inputs = request()->validate([
            'title'=> 'required|min:2|max:255',
            'post_image'=> 'file',
            'body'=>'required'
        ]);

        if(request('post_image')){
            $inputs['post_image'] = request('post_image')->store('images');
            $post->post_image = $inputs['post_image'];
        }

        $post->title = $inputs['title'];
        $post->body = $inputs['body'];

        $post->save();

        session::flash('message-updated','Post was updated.');

        $this->authorize('update',$post);

        return redirect()->route('post.index');
    }

    public function destroy(Post $post){

    $this->authorize('delete',$post);

    $post->delete();

    session::flash('message-delete','Post was deleted.');

    return back();
    }



}
