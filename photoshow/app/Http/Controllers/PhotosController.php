<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Photo;
use Illuminate\Support\Facades\Storage;

class PhotosController extends Controller
{
  public function create($album_id) {
    return view('photos.create')->with('album_id', $album_id);
  }

  public function store(Request $request) {
    $this->validate($request, [
      'title' => 'required',
      'photo' => 'image|max:1999',
      'album_id' => 'required'
    ]);

    $path = $this->storeFile($request, 'photo', $request->input('album_id'));

    $photo = new Photo;
    $photo->album_id = $request->input('album_id');
    $photo->title = $request->input('title');
    $photo->description = $request->input('description');
    $photo->size = $request->file('photo')->getSize();
    $photo->photo = $path;

    $photo->save();

    return redirect('/albums/'.$request->input('album_id'))->with('success', 'Photo Uploaded');
  }

  private function storeFile(Request $request, $fieldName, $album_id)
  {

    $filenameWithExtension = $request->file($fieldName)->getClientOriginalName();

    $filename = pathinfo($filenameWithExtension, PATHINFO_FILENAME);

    $extension = $request->file($fieldName)->getClientOriginalExtension();

    $filenameToStore = $filename . '_' . time() . '.' . $extension;

    $path = $request->file($fieldName)->storeAs('public/photos/'.$album_id.'/', $filenameToStore);

    return $filenameToStore;
  }

  public function show($id)
  {
    $photo = Photo::find($id);
    return view('photos.show')->with('photo', $photo);
  }

  public function destroy($id) {

    $photo = Photo::find($id);

    Storage::delete('public/photos/'.$photo->album_id.'/'.$photo->photo);

    $photo->delete();
    return redirect('/')->with('success', 'Photo Deleted');
  }
}
