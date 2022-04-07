<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as ImageManager;
use Illuminate\Support\Str;

class Helpers
{
    public static function format_price($price = 0)
    {

        return '$ ' . number_format($price, 2);
    }

    public static function move_image(string $path_old_img, string $name, string $location)
    {

        $path_new_img = $location . '/' . self::generate_img_name($path_old_img, $name);

        //SAVE IMG
        $img_covert = ImageManager::make('storage/' . $path_old_img)->widen(1920, function ($constraint) {
            $constraint->upsize();
        })->limitColors(255)->encode();

        Storage::put($path_new_img, (string) $img_covert);

        //se borra la imagen antigua que no se usara
        Storage::delete($path_old_img);

        return $path_new_img;
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



    public static function delete_images_all($model)
    {

        if ($model->images->isNotEmpty()) {  //isNotEmpty  -> no esta vacio 
            $images_delete = [];
            foreach ($model->images as  $img) {
                array_push($images_delete, $img->image);
                array_push($images_delete, 'thumbnail/' . $img->image);
            }
            Storage::delete($images_delete);
        }
    }
    public static function generate_img_name(string $img, string $name)
    {
        $image_array_extension = explode('.', $img);

        $extension = '.' . array_pop($image_array_extension); // get -> .jpg

        $new_name_img = Str::slug($name) . '-' . rand(1, 100)  . $extension;

        return $new_name_img;
    }
}
