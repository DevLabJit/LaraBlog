<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

   
        $posts = Post::latest()->where('status', '=', '0')->get();

        
        /*$posts = DB::table('posts')
            ->join('users', 'posts.user_id', '=', 'users.id')
            ->join('categories', 'posts.category_id', '=', 'categories.id')
            ->select('users.name', 'categories.name as category', 'posts.title', 'posts.slug', 'posts.status','posts.created_at')
            ->latest()
            ->get();*/

        return view('admin.blog.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $categories = Category::latest()->get();

        return view('admin.blog.posts.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $PostRequest)
    {   

        $PostRequest->validated();

        $post = new Post();
        $category = Category::findOrFail($PostRequest['category_id']);


        $post->title = Str::title($PostRequest->title);
        $post->slug = Str::slug($post->title, '-');
        $post->content = trim($PostRequest->content);
        $post->category_id = $category;

        //File upload
        if($PostRequest->hasFile('image'))
        {
            $file = $PostRequest->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('uploads/posts/', $filename);
            $post->image = $filename;
        }
        /*if ($PostRequest->file('image')) {

            $imagePath = 'storage/' . $PostRequest->file('image')->store('postsImages', 'public');
        }
        */
        /*$post->image = $imagePath;*/
        $category->posts()->save($post);

        return back()->withInput();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {   
        $categories = Category::all();
        return view('admin.blog.posts.edit', compact('post', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $PostRequest, Post $post)
    {

        $PostRequest->validated();


        $post->category_id = $PostRequest->category_id;
        $post->title = Str::title($PostRequest->title);
        $post->slug = Str::slug($post->title, '-');
        $post->content = trim($PostRequest->content);

        if($PostRequest->hasFile('image'))
        {
            $destination = 'uploads/posts/'.$post->image;
            if(File::exists($destination))
            {
                File::delete($destination);
            }
            $file = $PostRequest->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('uploads/posts/', $filename);
            $post->image = $filename;
        }

        $post->update();


        return redirect(route('posts.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post = Post::where('id', $post->id)->firstOrFail();
        
        $post->category->delete();

        return redirect(route('posts.index'));
    }

}
