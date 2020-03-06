<?php

namespace App\Http\Controllers;
use Auth;
use App\Tag;
use App\Category;
use App\Post;

use Illuminate\Http\Request;
use App\Http\Requests\Posts\CreatePostRequest;
use App\Http\Requests\Posts\UpdatePostRequest;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        if($categories->count() == 0)
        {
            session()->flash('error', 'You Must have Choose At least One Category');

            return redirect()->back();
        }
        return view('Blog.posts.create')->with('categories',$categories)
                                         ->with('tags',Tag::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePostRequest $request)
    {
        $featured = $request->featured;
        $featuerd_new = time().$featured->getClientoriginalName();
        $featured->move('uploads/posts', $featuerd_new);

        $post = Post::create([


                'title' => $request->title,
                'body' => $request->body,
                'featured' => 'uploads/posts/'. $featuerd_new,
                'category_id' => $request->category_id,
                'slug'=> $request->title,
                'user_id'=>Auth::id()


        ]);

          $post->tags()->attach($request->tags);

          session()->flash('success','Your post has been Created Succesfully');


          return redirect(route('post.list'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $posts = Post::find($id);

        return view('Blog.posts.create')->with('post',$posts)

                                       ->with('categories', Category::all())
                                       ->with('tags',Tag::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request, $id)
    {

        $posts = Post::find($id);

        if($request->hasfile('featured')){


        $featured = $request->featured;
        $featuerd_new = time().$featured->getClientoriginalName();
        $featured->move('uploads/posts', $featuerd_new);
        $posts->featured ='uploads/posts/'.$featuerd_new;

        }
         $posts->title = $request->title;
         $posts->body = $request->body;
         $posts->category_id = $request->category_id;
         $posts->save();
         $posts->tags()->sync($request->tags);
         session()->flash('success','Your post has been Updated Succesfully');
         return redirect(route('post.list'));



    }

    public function list()
    {
        return view('Blog.posts.index')->with('posts', Post::all());
    }

    public function trashed()
    {

       $posts = Post::onlyTrashed()->get();
       return redirect(route('post.list'));

      // return view('admin.posts.trashed')->with('posts', $posts);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $posts = Post::find($id);

        $posts->delete();
        session()->flash('success','Your post has been deleted Succesfully');
        return redirect(route('post.list'));
    }
}
