<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\File;

class LabelController extends Controller
{
    /**
     * Return a JSON array of the names of every folder
     * under public/labeled_images, e.g. ["alice","bob","carol"]
     */
    public function index(): JsonResponse
    {
        $base = public_path('labeled_images');

        if (! File::exists($base)) {
            return response()->json([]);
        }

        $dirs   = File::directories($base);
        $labels = array_map(fn($dir) => basename($dir), $dirs);

        return response()->json($labels);
    }
}
