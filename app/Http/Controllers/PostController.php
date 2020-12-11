<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::latest()->paginate(10);
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostRequest $request)
    {
        if($request->hasFile('file-upload')){
            if ($request->file('file-upload')->isValid()){
                $path = $request->file('file-upload')->store('post-photos', 'public');

                $validated = $request->validated();
                Post::create([
                    'name' => $request->input('name'),
                    'body' => $request->input('body'),
                    'cover_photo_path' => $path,
                ]);
                return redirect()->route('posts.index');
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('posts.show' , compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        if($request->hasFile('file-upload')){
            if ($request->file('file-upload')->isValid()){
                Storage::delete('public/'.$post->cover_photo_path);

                $path = $request->file('file-upload')->store('post-photos', 'public');

                $validated = $request->validated();
                $post->update([
                    'body' => $request->input('body'),
                    'cover_photo_path' => $path,
                ]);

                return redirect()->route('posts.index');
            }
        }
        else{
            $post->update($request->validated());
            return redirect()->route('posts.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        Storage::delete('public/'.$post->cover_photo_path);
        $post->delete();
        return redirect()->route('posts.index');
    }
}
