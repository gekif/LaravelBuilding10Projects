<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AlbumsController extends Controller
{
    public function index()
    {
        return view('albums.index');
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

        return $path;
    }

}
