<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Album;

class AlbumsController extends Controller
{
  public function index()
  {
    $albums = Album::all();
    return view('albums.index')->with('albums', $albums);
  }

  public function create(Request $request)
  {
    return view('albums.create');
  }

  public function store(Request $request)
  {

    $this->validate($request, [
      'name' => 'required',
      'cover_image' => 'image|max:1999'
    ]);

    // Store file
    $path = $this->storeFile($request);

    // Create album
    $album = new Album;

    $album->name = $request->input('name');
    $album->description = $request->input('description');
    $album->cover_image = $path;

    $album->save();

    return redirect('/albums')->with('success', 'Album Created');

  }

  private function storeFile(Request $request)
  {

    $filenameWithExtension = $request->file('cover_image')->getClientOriginalName();

    $filename = pathinfo($filenameWithExtension, PATHINFO_FILENAME);

    $extension = $request->file('cover_image')->getClientOriginalExtension();

    $filenameToStore = $filename . '_' . time() . '.' . $extension;

    $path = $request->file('cover_image')->storeAs('public/album_covers', $filenameToStore);

    return $filenameToStore;
  }

  public function show($id) {
    $album = Album::with('photos')->find($id);
    return view('albums.show')->with('album', $album);
  }

}
