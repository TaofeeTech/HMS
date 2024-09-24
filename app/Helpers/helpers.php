<?php

use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

if (!function_exists('upload_file')) {
    function upload_file($file, $height, $width, $path)
    {
        if ($file) {

            $manager = new ImageManager(new Driver());
            $name_gen = hexdec(uniqid()) . '.' . $file->getClientOriginalExtension();
            $img = $manager->read($file);
            $img = $img->resize($height, $width);
            $img->toJpeg(80)->save(base_path('public/uploads/' . $path . '/' . $name_gen));
            $save_url = 'uploads/' . $path . '/' . $name_gen;

            return $save_url;

        }

        return null;
    }
}
