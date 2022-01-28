<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class UploadController extends Controller
{
    public function upload(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'image' => 'required|image:jpeg,png,jpg|max:2048'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $uploadFolder = 'foods';
        $image = $request->file('image');
        $image_uploaded_path = $image->store($uploadFolder, 'public');
        $image_url = Storage::disk('public')->url($image_uploaded_path);

        return response()->json($image_url);
    }
}
