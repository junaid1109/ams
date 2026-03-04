<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UploadController extends Controller
{
    public function uploadImage(Request $request)
    {
        try {
            if (!$request->hasFile('upload')) {
                return response()->json([
                    'uploaded' => false,
                    'error' => [
                        'message' => 'No file provided'
                    ]
                ], 400);
            }

            $file = $request->file('upload');
            
            if (!$file->isValid()) {
                return response()->json([
                    'uploaded' => false,
                    'error' => [
                        'message' => 'Invalid file'
                    ]
                ], 400);
            }

            $extension = strtolower($file->getClientOriginalExtension());
            $allowed = ['jpeg', 'jpg', 'png', 'gif', 'webp'];
            
            if (!in_array($extension, $allowed)) {
                return response()->json([
                    'uploaded' => false,
                    'error' => [
                        'message' => 'Only JPG, PNG, GIF, WebP allowed'
                    ]
                ], 400);
            }

            if ($file->getSize() > 5120000) {
                return response()->json([
                    'uploaded' => false,
                    'error' => [
                        'message' => 'File too large (max 5MB)'
                    ]
                ], 400);
            }

            // Store file with UUID-based name
            $filename = time() . '_' . uniqid() . '.' . $extension;
            
            // Use Storage facade directly
            $disk = Storage::disk('public');
            $path = $disk->putFileAs('ckeditor', $file, $filename);

            if (!$path) {
                return response()->json([
                    'uploaded' => false,
                    'error' => [
                        'message' => 'Could not save file'
                    ]
                ], 500);
            }

            // Return URL for CKEditor (force HTTPS if on secure connection)
            $url = asset('storage/' . $path);
            if (request()->secure()) {
                $url = str_replace('http://', 'https://', $url);
            }
            
            return response()->json([
                'uploaded' => true,
                'url' => $url
            ], 200);

        } catch (\Exception $e) {
            \Log::error('Upload error: ' . $e->getMessage());
            
            return response()->json([
                'uploaded' => false,
                'error' => [
                    'message' => 'Upload error: ' . $e->getMessage()
                ]
            ], 500);
        }
    }
}
