<?php

namespace App\Http\Controllers;

use App\Album;
use Illuminate\Http\Request;

class AlbumsController extends Controller
{
    public function index()
    {
        $albums = Album::all();

        return view('albums.index')->with('albums', $albums);
    }


    public function create()
    {
        return view('albums.create');
    }


    public function store(Request $request)
    {
        $rules = [
            'name' => 'required',
            'description' => 'required',
            'cover_image' => 'image|max:1999'
        ];

        $this->validate($request, $rules);

        $uploadedFile = $request->file('cover_image');

        // Get Filename With Extension
        $fileNameWithExt = $uploadedFile->getClientOriginalName();

        // Get Just File Name
        $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);

        // Get Extension
        $extension = $uploadedFile->getClientOriginalExtension();

        // Create New Filename
        $fileNameToStore = $fileName . '_' . time() . '.' . $extension;

        // Upload Image
        $path = $uploadedFile
            ->storeAs('public/album_covers', $fileNameToStore);

        // Create Album
        $album = new Album();

        $album->name = $request->input('name');
        $album->description = $request->input('description');
        $album->cover_image = $fileNameToStore;

        $album->save();

        return redirect('/albums')->with('success', 'Album Created');
    }


    public function show($id)
    {
        $album = Album::with('photos')->find($id);

        return view('albums.show')->with('album', $album);
    }

}
