<?php

namespace App\Http\Controllers;

use App\Models\bio;
use Bio as GlobalBio;
use Illuminate\Http\Request;

class homeBioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home.bio');
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
            'penulis' => 'required|max:255',
        ]);

        bio::create($validatePost);

        return redirect('/')->with('success', 'Postingan Berhasil Diupload');
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
    public function edit(bio $bio)
    {  
        return view('home.edit', compact('bio'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, bio $bio)
    {
        $validatePost = $request->validate([
            'judul' => 'required|max:255',
            'isi' => 'required',
            'penulis' => 'required|max:255',
        ]);

        bio::where('id', $bio->id)->update($validatePost);

        return redirect('/')->with('edit', 'Berhasil Ubah Bio');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
