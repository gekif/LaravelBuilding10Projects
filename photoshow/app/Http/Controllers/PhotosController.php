<?php

namespace App\Http\Controllers;

use App\Photo;
use Illuminate\Http\Request;

class PhotosController extends Controller
{
    public function create($album_id)
    {
        return view('photos.create')->with('album_id', $album_id);
    }


    public function store(Request $request)
    {
        $rules = [
            'title' => 'required',
            'photo' => 'image|max:1999'
        ];

        $this->validate($request, $rules);

        $uploadedFile = $request->file('photo');

        // Get filename with extension
        $fileNameWithExt = $uploadedFile->getClientOriginalName();

        // Get just the filename
        $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);

        // Get extension
        $extension = $uploadedFile->getClientOriginalExtension();

        // Create new filename
        $fileNameToStore = $fileName . '_' . time() . '.' . $extension;

        // Uplaod image
        $path = $uploadedFile->storeAs('public/photos/' . $request->input('album_id'), $fileNameToStore);

        // Upload Photo
        $photo = new Photo;

        $photo->album_id = $request->input('album_id');
        $photo->title = $request->input('title');
        $photo->description = $request->input('description');
        $photo->size = $uploadedFile->getClientSize();
        $photo->photo = $fileNameToStore;

        $photo->save();

        return redirect('/albums/'.$request->input('album_id'))->with('success', 'Photo Uploaded');
    }
}
