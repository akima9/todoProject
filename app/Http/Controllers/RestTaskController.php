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

        /* $validator = Validator::make($request->all(), [
            'title' => 'required|max:50',
            'contents' => 'required',
        ], $this->messages);

        if ($validator->fails()) {
            return redirect('tasks/' . $id . '/edit')
                    ->withErrors($validator)
                    ->withInput();
        } else {
            $this->task->where('id', $id)
                ->update([
                    'title' => $request->input('title'),
                    'contents' => $request->input('contents')]
                );

            return redirect('tasks/'.$id);
        }//end if */
    }

    /* public function edit($id)
    {
        $data = $this->task->where('id', $id)->first();

        return view('tasks/edit', ['task' => $data]);
    } */
}
