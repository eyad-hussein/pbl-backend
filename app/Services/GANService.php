<?php

namespace App\Services;

use Exception;
use Illuminate\Support\Facades\Http;


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


        $image = base64_encode(file_get_contents($data['image']));
        $endpoint = env('FLASK_API_URL') . '/' . $task;

        try {

            $response = Http::withHeaders([
                'Content-Type' => 'application/json',
                'Accept' => '*/*',
                'Accept-Encoding' => 'gzip, deflate, br',
                'Connection' => 'keep-alive',
            ])->post($endpoint, [
                        'image' => $image,
                    ]);


            return response([
                "processed_image" => $response["processed_image"]
            ]);
        } catch (Exception $e) {
            return $e->getMessage();
        }

    }
}