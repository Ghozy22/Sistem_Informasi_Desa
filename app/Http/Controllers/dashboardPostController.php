<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class dashboardPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $data = Post::all();
        return view('dashboard.post.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.post.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   

        $validatePost = $request->validate([
            'judul' => 'required|max:255',
            'isi' => 'required',
            'gambar' => 'image',
            'penulis' => 'required|max:255',
        ]);

        $validatePost['gambar'] = $request->file('gambar')->store('post-gambar');

        Post::create($validatePost);

        return redirect('/dashboard/post')->with('success', 'Postingan Berhasil Diupload');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('dashboard.post.show', compact('post'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('dashboard/post/edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $validatePost = $request->validate([
            'judul' => 'required|max:255',
            'isi' => 'required',
            'gambar' => 'image',
            'penulis' => 'required|max:255',
        ]);

        if($request->file('gambar')){
            if($request->gbrLama){
                Storage::delete($request->gbrLama);
            }
            $validatePost['gambar'] = $request->file('gambar')->store('post-gambar');
        } 

        Post::where('id', $post->id)->update($validatePost);

        return redirect('/dashboard/post')->with('edit', 'Data Berhasil Di Ubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {   
        if($post->gambar){
            Storage::delete($post->gambar);
        }

        Post::destroy($post->id);

        return redirect('/dashboard/post')->with('hapus', 'Postingan Berhasil Dihapus');
    }
}
