<?php

namespace App\Traits;

use Illuminate\Support\Facades\Storage;

trait ImageUploadTrait
{
    /**
     * Handle image upload.
     * 
     * @param \Illuminate\Http\UploadedFile $file
     * @param string $folder
     * @return string $filePath
     */
    public function uploadImage($file, $folder = 'images')
    {
        // Generate a unique filename
        $filename = time() . '.' . $file->getClientOriginalExtension();

        // Store the file in the 'public' disk and return the file path
        $filePath = $file->storeAs($folder, $filename, 'public');

        return $filePath;
    }

    /**
     * Delete an image from storage.
     * 
     * @param string $filePath
     * @return void
     */
    public function deleteImage($filePath)
    {
        if ($filePath && Storage::disk('public')->exists($filePath)) {
            Storage::disk('public')->delete($filePath);
        }
    }
}
