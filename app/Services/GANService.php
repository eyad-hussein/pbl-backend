<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;


use \GuzzleHttp\Client;

class GANService
{
    private $flaskApiUrl;

    public function __construct()
    {
        $this->flaskApiUrl = env('FLASK_API_URL');
    }

    public function execute(array $data)
    {
        $image = $data["image"];
        $task = $data["task"];
        $model = $data["model"];

        $directory = 'public/temp/input';
        if (!Storage::exists($directory)) {
            Storage::makeDirectory($directory);
        }

        $path = $image->storeAs($directory, $image->getClientOriginalName());

        $endpoint = env('FLASK_API_URL') . '/' . $task . '/' . $model;
        dd($endpoint);

        $response = Http::post($endpoint, [
            'path' => $path
        ]);


        if ($response->successful()) {
            return $response->json();
        } else {
            return null;
        }

    }
}