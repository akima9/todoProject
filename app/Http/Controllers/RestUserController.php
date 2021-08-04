<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class RestUserController extends Controller
{
    private $user;

    public function __construct()
    {
        $this->user = new User;
    }

    public function userIdDupeChk($id)
    {
        $dupeData = $this->user->where('userId', $id)->first();
        $result = [];
        if(empty($dupeData)){
            $result['msg'] = 'success';
        } else {
            $result['msg'] = 'dupe';
        }
        return response()->json($result);
    }

    /* public function show($id)
    {
        $task = $this->task->where('id', $id)->first();
        $taskGroup = $this->taskGroup->where('id', $task->group)->first();

        return view('tasks/show', ['task' => $task, 'taskGroup' => $taskGroup]);
    } */

    /* public function list()
    {
        $tasks = DB::table('tasks')
            ->leftjoin('taskgroup', 'tasks.group', '=', 'taskgroup.id')
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
    } */
}
