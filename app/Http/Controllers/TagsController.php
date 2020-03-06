<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Tag\UpdatetagRequest;
use App\Http\Requests\Tag\CreatetagRequest;


use App\Tag;


class TagsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Blog.tags.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }


    public function list()
    {
        return view('Blog.tags.list')->with('tag', Tag::all());
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatetagRequest $request)
    {
        Tag::create([
            'tag' => $request->tag
          ]);

          session()->flash('success', 'tag created successfully.');

          return redirect(route('tag.list'));
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
    public function edit(Tag $tag)
    {
        return view('Blog.tags.index')->with('tag', $tag);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatetagRequest $request, Tag $tag)
    {
        $tag->update([
            'tag' => $request->tag
          ]);

          session()->flash('success', 'tag updated successfully.');

          return redirect(route('tag.list'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tag $tag)
    {
        // if ($tag->leaders-> count() > 0) {
        //     session()->flash('error', 'tag cannot be deleted because it has some leaders.');

        //     return redirect()->back();
        //   }

        $tag->delete();

        session()->flash('success', 'tag deleted successfully.');

        return redirect(route('tag.list'));
    }
}
