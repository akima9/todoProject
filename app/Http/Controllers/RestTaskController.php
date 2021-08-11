<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class RestTaskController extends Controller
{
    private $task;

    public function __construct()
    {
        $this->task = new Task;
    }

    public function list($id)
    {
        $tasks = DB::table('tasks')
            ->leftjoin('taskgroup', 'tasks.group', '=', 'taskgroup.id')
            ->where('tasks.writer_id', '=', $id)
            ->select('tasks.id', 'tasks.title', 'tasks.start', 'tasks.end', 'taskgroup.bgColor as color', 'taskgroup.fontColor as textColor')
            ->get();
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
