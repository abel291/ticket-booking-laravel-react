<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Spatie\Image\Image as SpatieImage;
use Spatie\Image\Manipulations;

class Helpers
{
    public static function format_price($price = 0)
    {
        return '$ '.number_format($price, 2);
    }

    public static function move_image(string $directory, string $image, string $name, string $extension, bool $thumb)
    {
        $new_name_img = $name.'-'.Str::slug(Str::random(4)).'.'.$extension;

        //SAVE IMG
        Storage::makeDirectory($directory);
        SpatieImage::load($image)
            ->fit(Manipulations::FIT_MAX, 1920, 1080)
            ->quality(80)
            ->optimize()
            ->save('storage/'.$directory.'/'.$new_name_img);

        //img thum
        if ($thumb) {
            //Storage::makeDirectory($directory);
            $new_name_img = 'thumb-'.$new_name_img;
            SpatieImage::load($image) //optimizo imagen
                ->width(420)
                ->quality(80)
                ->optimize()
                ->save('storage/'.$directory.'/'.$new_name_img);
        }

        return $new_name_img;
    }

    // public static function images_store(array $images, string $path_name, $thumbnail = false)
    // {
    //     $array_images = [];
    //     //$this->path . '/' . $product->slug . uniqid()
    //     foreach ($images as $key => $img) {
    //         $name_img = $path_name . "-" . uniqid() . "-" . $key . "." . $img->extension();
    //         self::move_image($img, $name_img, $thumbnail);
    //         $array_images[$key] = ['img' => $name_img];
    //     }
    //     return $array_images;
    // }

    // public static function delete_images_all($model)
    // {

    //     if ($model->images->isNotEmpty()) {  //isNotEmpty  -> no esta vacio
    //         $images_delete = [];
    //         foreach ($model->images as  $img) {
    //             array_push($images_delete, $img->image);
    //             array_push($images_delete, 'thumbnail/' . $img->image);
    //         }
    //         Storage::delete($images_delete);
    //     }
    // }

    public static function generate_img_name(string $name, string $extension)
    {
        return  $name.'-'.Str::slug(Str::random(5)).'.'.$extension;
    }
}
