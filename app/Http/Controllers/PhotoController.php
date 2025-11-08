<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use Illuminate\Http\Request;

class PhotoController extends Controller
{
    public function index()
    {
        $photos = Photo::latest()->get();
        return view('index', compact('photos'));
    }

    public function create()
    {
        return view('upload');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'image' => 'required|image|max:2048',
        ]);

        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('uploads'), $imageName);

        Photo::create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $imageName,
            'date' => $request->date,
        ]);

        return redirect()->route('gallery.index')->with('success', 'Foto berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $photo = Photo::findOrFail($id);
        return view('edit', compact('photo'));
    }

    public function update(Request $request, $id)
    {
        $photo = Photo::findOrFail($id);

        $request->validate([
            'title' => 'required',
            'image' => 'image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('uploads'), $imageName);
            $photo->image = $imageName;
        }

        $photo->update([
            'title' => $request->title,
            'description' => $request->description,
            'date' => $request->date,
        ]);

        return redirect()->route('gallery.index')->with('success', 'Foto berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $photo = Photo::findOrFail($id);
        $imagePath = public_path('uploads/'.$photo->image);

        if (file_exists($imagePath)) {
            unlink($imagePath);
        }

        $photo->delete();

        return redirect()->route('gallery.index')->with('success', 'Foto berhasil dihapus!');
    }
}
