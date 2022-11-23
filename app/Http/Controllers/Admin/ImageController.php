<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Image as Images;
use Intervention\Image\Facades\Image;
use Diglactic\Breadcrumbs\Breadcrumbs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    public function index()
    {
        $image = Images::find(1);

        return view('admin.image.index',[
            'title' => 'Image Test',
            'subtitle' => 'Test uploads gambar public dan private',
            'breadcrumbs' => Breadcrumbs::render('image'),
            'image' => $image,
        ]);
    }

    public function update(Request $request)
    {
        $image = Images::find(1);

        $public = $image->public;
        $private = $image->private;
        $filename = $image->filename;
        $compress = $image->compress;

        if ($request->hasFile('public')) {
            $public = $request->file('public')->store('uploads');
        }
        if ($request->hasFile('private')) {
            $private = $request->file('private')->store('uploads/private','private');
        }
        if ($request->hasFile('filename')) {
            $filename = $request->file('filename')->storeAs('uploads', $image->id.'.jpg');
        }
        if ($request->hasFile('compress')) {
            $location = 'uploads/'. $image->id.'.jpg';
            Image::make($request->file('compress'))->resize(1920, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save($location);
            $compress = $location;
        }

        $image->update([
            'public' => $public,
            'private' => $private,
            'filename' => $filename,
            'compress' => $compress,
        ]);

        return redirect()->route('image.index')->with('success', 'Data photo diupdate');

    }

    public function deletepublic()
    {
        $image = Images::find(1);

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
        $image = Images::find(1);

        $private = $image->private;
        if ($private != null) {
            Storage::disk('private')->delete($private);
        }

        $image->update([
            'private' => null,
        ]);

        return redirect()->route('image.index')->with('success', 'Data photo diupdate');
    }

    public function deletename()
    {
        $image = Images::find(1);

        $filename = $image->filename;
        if ($filename != null) {
            Storage::delete($filename);
        }

        $image->update([
            'filename' => null,
        ]);

        return redirect()->route('image.index')->with('success', 'Data photo diupdate');
    }

    public function deletecompress()
    {
        $image = Images::find(1);

        $compress = $image->compress;
        if ($compress != null) {
            Storage::delete($compress);
        }

        $image->update([
            'compress' => null,
        ]);

        return redirect()->route('image.index')->with('success', 'Data photo diupdate');
    }
}
