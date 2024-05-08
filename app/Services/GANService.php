<?php

namespace App\Services;

use Exception;
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

        $directory = 'public/temp/input';
        if (!Storage::exists($directory)) {
            Storage::makeDirectory($directory);
        }


        $fileContents = file_get_contents($image);
        $fileName = $image->getClientOriginalName();

        $path = '/home/eyad/Downloads/input/' . $fileName;

        file_put_contents($path, $fileContents);

        $endpoint = env('FLASK_API_URL') . '/' . $task;

        try {
            Http::withHeaders([
                'Content-Type' => 'application/json',
                'Accept' => '*/*',
                'Accept-Encoding' => 'gzip, deflate, br',
                'Connection' => 'keep-alive',
            ])->post($endpoint, [
                        'path' => $path
                    ]);
        } catch (Exception $e) {
            return response($e->getMessage());
        }


        return response([
            "message" => "success"
        ]);

    }
}