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
        // dd($request);
        $data = [
            'image' => $request->file('image'),
            'task' => $task,
        ];
        // dd($data);

        return $this->ganService->execute($data);
    }

    public function test(Request $request)
    {
        dd($request);
    }
}
