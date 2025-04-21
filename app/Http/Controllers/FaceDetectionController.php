<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class FaceDetectionController extends Controller
{
    public function index()
    {
        return view('pages.face_detection');
    }

    /**
     * Return a JSON array of all folder names under public/labeled_images.
     */
    public function getLabels()
    {
        $base = public_path('labeled_images');
        if (! File::exists($base)) {
            return response()->json([], 200);
        }

        $dirs = File::directories($base);
        $labels = array_map(fn($dir) => basename($dir), $dirs);

        return response()->json($labels, 200);
    }
}
