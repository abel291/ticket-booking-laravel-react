<?php

namespace App\Services\MediaLibrary;

use Spatie\MediaLibrary\Conversions\Conversion;
use Spatie\MediaLibrary\Support\FileNamer\FileNamer;
use Illuminate\Support\Str;

class CustomFileNamer extends FileNamer
{
    public function originalFileName(string $fileName): string
    {
        
        return $fileName . '-' . Str::slug(Str::random(4));
    }

    public function conversionFileName(string $fileName, Conversion $conversion): string
    {
        $strippedFileName = pathinfo($fileName, PATHINFO_FILENAME);

        return "{$strippedFileName}-{$conversion->getName()}";
    }

    public function responsiveFileName(string $fileName): string
    {
        return pathinfo($fileName, PATHINFO_FILENAME);
    }
}
