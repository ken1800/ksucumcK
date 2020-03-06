<?php

namespace App\Http\Controllers;
use App\Category;
use App\Post;
use App\User;
use App\Tag;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Blog.dashboard')
                    ->with('posts_count', Post::all()->count())
                    ->with('trashed_count', Post::onlyTrashed()->get()->count())
                    ->with('tags_count', Tag::all()->count())
                    ->with('categories_count', Category::all()->count());
    }


    // public function index()
    // {
    //     return view('leaders.index')->with('position', Position::all())->with('years', Year::all());
    // }
}
