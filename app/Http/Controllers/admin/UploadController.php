<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UploadController extends Controller {
    public function uploadImage(Request $request) {
        $fileName = time() . '-' . $request->file('file')->getClientOriginalName();
        $request->file('file')->storeAs('public/image', $fileName);
        $url = '/storage/image/' . $fileName;
        return response()->json([
            'success' => true,
            'path' => $url
        ]);
    }

    public function uploads(Request $request){
        $files = $request->file('files');
        $url = [];
        foreach ($files as $file) {
            $fileName = time() . '-' . $file->getClientOriginalName();
            $file->storeAs('public/images', $fileName);
            $url[] = '/storage/images/' . $fileName;
        }
        return response()->json([
            'success' => true,
            'paths' => $url
        ]);
    }
}

