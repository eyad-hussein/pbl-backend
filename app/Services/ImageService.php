<?php

namespace App\Services;

class ImageService
{
    public function decode($image)
    {
        return base64_decode($image);
    }
}