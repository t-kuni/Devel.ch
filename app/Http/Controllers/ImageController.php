<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Image;

class ImageController extends Controller
{
    //
    public function getImage(Request $request) {
        $id = $request->id;

        $image = Image::findOrFail($id);

        return response($image->image)
            ->header('Content-Type', $image->mime_type);
    }
}
