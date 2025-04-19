<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class FrameController extends Controller
{
    public function store(Request $request)
    {
        // validate
        $data = $request->validate([
            'folderName' => 'required|string|alpha_dash',
            'images'     => 'required|array|size:20',
            'images.*'   => 'required|string',
        ]);

        $folder = public_path("labeled_images/{$data['folderName']}");

        // create the directory if needed
        if (! File::exists($folder)) {
            File::makeDirectory($folder, 0755, true);
        }

        // decode and save each frame
        foreach ($data['images'] as $i => $base64) {
            list(, $body) = explode(',', $base64);
            $image = base64_decode($body);
            File::put("{$folder}/".($i + 1).".png", $image);
        }
        

        return response()->json(['status'=>'ok'], 201);
    }
}
