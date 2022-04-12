<?php

namespace App\Services\MediaLibrary;

use App\Models\Blog;
use App\Models\Event;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\MediaLibrary\Support\PathGenerator\PathGenerator;

class CustomPathGenerator implements PathGenerator
{
    /*
     * Get the path for the given media, relative to the root storage path.
     */
    public function getPath(Media $media): string
    {   
        if ($media->model instanceof Blog) {
            return 'posts/' . date('Y').'/';
        }

        if ($media->model instanceof Event) {
            return 'events/' . date('Y').'/';
        }
        return 'images/';
    }

    /*
     * Get the path for conversions of the given media, relative to the root storage path.
     */
    public function getPathForConversions(Media $media): string
    {
        return $this->getPath($media);
    }

    /*
     * Get the path for responsive images of the given media, relative to the root storage path.
     */
    public function getPathForResponsiveImages(Media $media): string
    {
        return $this->getPath($media) . 'responsive/';
    }
}
