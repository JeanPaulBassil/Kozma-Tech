<?php 

namespace App\Services;

use Cloudinary\Cloudinary;

class CloudinaryService
{
    protected $cloudinary;

    public function __construct()
    {
        $this->cloudinary = new Cloudinary([
            'cloud' => [
                'cloud_name' => env('CLOUDINARY_CLOUD_NAME'), 
                'api_key' => env('CLOUDINARY_API_KEY'), 
                'api_secret' => env('CLOUDINARY_API_SECRET')
            ],
            'url' => [
                'secure' => true
            ]
        ]);
    }

    public function upload($imagePath)
    {
        return $this->cloudinary->uploadApi()->upload($imagePath)['url'];
    }
}
