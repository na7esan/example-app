<?php

declare(strict_types=1);

namespace App\Modules\ImageUpload;

use Illuminate\Support\Facades\Storage;

class LocalImageManager implements ImageManagerInterface
{
    public function save($file): string
    {
        $path = (string) Storage::putFile('public/images', $file);
        $array = (array) explode("/", $path);
        return end($array);
    }

    public function delete(string $name): void
    {
        $filePath = 'public/images/' . $name;
        if (Storage::exists($filePath)) {
            Storage::delete($filePath);
        }
    }
}
