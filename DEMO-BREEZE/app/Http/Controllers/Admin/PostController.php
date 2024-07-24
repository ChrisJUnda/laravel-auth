<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $posts = Post::all();


        // dd($posts);
        return view('admin.posts.index', compact('posts'));

        // return 'sono io';
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        // dd($request->all());
        $data = $request->validated();



        //Gestione Slug
        $data['slug'] = Str::of($data['title'])->slug();

        //Gestione immagine
        $img_path = Storage::put('uploads', $data['cover_image']);

        $post = new Post();

        $post->title = $data['title'];
        $post->content = $data['content'];
        $post->slug = $data['slug'];
        $post->cover_image = $img_path;
        $post->save();
        return redirect()->route('admin.posts.index')->with('message', 'Progetto creato correttamente');
        // $post->slug = Str::of($post->title)->slug();
    }

    /**
     * Display the specified resource.
     */
    // public function show(string $slug)
    public function show(Post $post)
    {
        // $post = Post::where('slug', $slug)->first();
        return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('admin.posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        // dd($request->all());

        $data = $request->validated(); //se non validate,redirect a risorsa precedente
        $data['slug'] = Str::of($data['title'])->slug();


        // $post->title = $data['title'];
        // $post->content = $data['content'];
        // $post->slug = $data['slug'];

        // $post->save();
        $post->update($data);
        return redirect()->route('admin.posts.index')->with('message', $post->id . ' - Post aggiornato correttamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {

        $post_id = $post->id;


        // return 'Stai cancellando';
        $post->delete();

        return redirect()->route('admin.posts.index')->with('message', $post_id . ' - Post aggiornato correttamente');
    }
}
