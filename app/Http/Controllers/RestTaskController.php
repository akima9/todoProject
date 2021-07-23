<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class RestTaskController extends Controller
{
    private $task;

    public function __construct()
    {
        $this->task = new Task;
    }

    public function list()
    {
        $tasks = $this->task->select('id', 'title', 'start', 'end')->get();
        return response()->json($tasks);
    }

    public function update(Request $request, $id)
    {
        $data = $this->task->where('id', $id)
                ->update([
                    'start' => $request->input('start'),
                    'end' => $request->input('end')]
                );

        return response()->json($data);
    }

}
