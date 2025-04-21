<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class FrameController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'folderName' => 'required|string|alpha_dash',
            'images'     => 'required|array|size:10',
            'images.*'   => 'required|string',
        ]);
        

        $folder = public_path("labeled_images/{$data['folderName']}");

        if (! File::exists($folder)) {
            File::makeDirectory($folder, 0755, true);
        }

        foreach ($data['images'] as $i => $base64) {
            list(, $body) = explode(',', $base64);
            File::put("{$folder}/".($i + 1).".png", base64_decode($body));
        }

        return response()->json(['status'=>'ok'], 201);
    }
}
