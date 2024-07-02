<?php

namespace App\Http\Traits;

use Illuminate\Support\Facades\File;
use Spatie\PdfToImage\Pdf;

trait FileTrait
{

    public function storeImage($image, $path, $model)
    {
        $imageName = time() . '.' . $image->extension();

        if ($image->extension() == 'pdf') {
            $image  = new Pdf($image);
            $image->saveImage('test');
        } else {
            $image->move(public_path($path), $imageName);
        }


        $model->files()->create([
            'title' => $imageName
        ]);
    }

    public function updateImage($image, $path, $model)
    {
        //Delete older File
        $filePath = public_path($path . '/' . $model->files()->value('title'));

        if (File::exists($filePath)) {
            File::delete($filePath);
        }

        //Create new File
        $imageName = time() . '.' . $image->extension();
        $image->move(public_path($path), $imageName);

        //Update File Name
        $oldImage = $model->files()->first();
        if ($oldImage) {
            $oldImage->update([
                'title' => $imageName
            ]);
        }
    }

    public function updateOrCreateImage($image, $path, $model)
    {
        if ($model->files()->exists()) {
            // Update existing image
            $this->updateImage($image, $path, $model);
        } else {
            // Create new image
            $this->storeImage($image, $path, $model);
        }
    }


    public function uploadResume($image, $path, $model)
    {
        $fileName = time() . '.' . $image->extension();
        $image->move(public_path($path), $fileName);

        $model->files()->create([
            'title' => $fileName
        ]);
    }

    public function deleteFile($path, $model)
    {
        $filePath = public_path($path . '/' . $model->files()->value('title'));
        if (File::exists($filePath)) {
            File::delete($filePath);
        }
    }
}
