<?php

namespace App\Services;

use \GuzzleHttp\Client;

class GANService
{
    private $flaskApiUrl;
    private $client;

    public function __construct()
    {
        $this->flaskApiUrl = env('FLASK_API_URL');
        $this->client = new Client();
    }
    public function execute(array $data)
    {
        $body = $this->createRequest($data);

        $response = $this->client->post($this->flaskApiUrl . '/task', [
            'headers' => ['Content-Type' => 'application/json'],
            'body' => $body,
        ]);

        return json_decode($response->getBody()->getContents(), true);
    }

    private function createRequest(array $data)
    {
        $image = $data['image'];
        $task = $data['task'];

        $body = json_encode([
            'image' => $image,
            'task' => $task,
        ]);
        return $body;
    }
}