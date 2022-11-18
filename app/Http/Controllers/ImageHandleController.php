<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;

class ImageHandleController extends Controller
{
    public function private($image)
    {
        $locked = Redirect::to(asset('assets/media/locked-image.jpg'));
        $content = Storage::disk('private')->get('uploads/private/'.$image);
        $response = Response::make($content, 200);
        $response->header("Content-Type", 'jpg');

        if (Auth::check()) {
            // return Storage::disk('private')->get('uploads/private/'.$image);
            return $response;
        } else {
            return $locked;
        }
    }
}
