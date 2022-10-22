<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Image;
use Diglactic\Breadcrumbs\Breadcrumbs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    public function index()
    {
        $image = Image::find(1);

        return view('admin.image.index',[
            'title' => 'Image Test',
            'subtitle' => 'Test uploads gambar public dan private',
            'breadcrumbs' => Breadcrumbs::render('image'),
            'image' => $image,
        ]);
    }

    public function update(Request $request)
    {
        $image = Image::find(1);

        $public = $image->public;
        $private = $image->private;

        if ($request->hasFile('public')) {
            $public = $request->file('public')->store('uploads');
        }
        if ($request->hasFile('private')) {
            $private = $request->file('private')->store('uploads/private','private');
        }

        $image->update([
            'public' => $public,
            'private' => $private,
        ]);

        return redirect()->route('image.index')->with('success', 'Data photo diupdate');

    }

    public function deletepublic()
    {
        $image = Image::find(1);

        $public = $image->public;
        if ($public != null) {
            Storage::delete($public);
        }

        $image->update([
            'public' => null,
        ]);

        return redirect()->route('image.index')->with('success', 'Data photo diupdate');
    }

    public function deleteprivate()
    {
        $image = Image::find(1);

        $private = $image->private;
        if ($private != null) {
            Storage::disk('private')->delete($private);
        }

        $image->update([
            'private' => null,
        ]);

        return redirect()->route('image.index')->with('success', 'Data photo diupdate');
    }
}
