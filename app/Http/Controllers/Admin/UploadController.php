<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UploadController extends Controller
{
    public function uploadImage(Request $request)
    {
        try {
            // Validate the upload
            if (!$request->hasFile('upload')) {
                return response()->json([
                    'error' => [
                        'message' => 'No file uploaded'
                    ]
                ], 422);
            }

            $file = $request->file('upload');
            
            // Validate file
            if (!$file->isValid()) {
                return response()->json([
                    'error' => [
                        'message' => 'File upload failed'
                    ]
                ], 422);
            }

            // Check file type
            $allowed = ['jpeg', 'jpg', 'png', 'gif', 'webp'];
            if (!in_array($file->getClientOriginalExtension(), $allowed)) {
                return response()->json([
                    'error' => [
                        'message' => 'Invalid file type. Only JPG, PNG, GIF, WebP allowed'
                    ]
                ], 422);
            }

            // Check file size (5MB max)
            if ($file->getSize() > 5120000) {
                return response()->json([
                    'error' => [
                        'message' => 'File is too large. Maximum size is 5MB'
                    ]
                ], 422);
            }

            $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('ckeditor', $filename, 'public');

            return response()->json([
                'url' => asset('storage/' . $path)
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'error' => [
                    'message' => 'Upload failed: ' . $e->getMessage()
                ]
            ], 400);
        }
    }
}
