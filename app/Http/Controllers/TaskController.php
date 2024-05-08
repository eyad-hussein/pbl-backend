<?php

namespace App\Http\Controllers;

use App\Services\GANService;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    protected $ganService;

    public function __construct(GANService $ganService)
    {
        $this->ganService = $ganService;
    }

    public function execute(Request $request, $task)
    {
        $data = [
            'image' => $request->file('image'),
            'task' => $task,
        ];

        return $this->ganService->execute($data);
    }

}
