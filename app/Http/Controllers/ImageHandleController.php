<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class ImageHandleController extends Controller
{
    public function private($image)
    {
        if (Auth::check()) {
            return Storage::disk('private')->get('uploads/private/'.$image);
        } else {
            return Redirect::to(asset('assets/media/locked-image.jpg'));
        }
    }
}
