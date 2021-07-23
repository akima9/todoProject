<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TaskGroup;
use Illuminate\Support\Facades\Validator;

class TaskGroupController extends Controller
{
    private $taskGroup;
    private $messages;

    public function __construct()
    {
        $this->taskGroup = new TaskGroup;
        $this->messages = [
            'groupName.required' => '제목을 입력해주세요.',
            'bgColor.required' => '배경색을 입력해주세요.',
            'fontColor.required' => '글자색을 입력해주세요.',
        ];
    }

    public function index()
    {
        $data = $this->taskGroup->all();
        return view('taskGroups/list', ['taskGroups' => $data]);
    }

    public function create()
    {
        return view('taskGroups/create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'groupName' => 'required|max:50',
            'bgColor' => 'required',
            'fontColor' => 'required',
        ], $this->messages);

        if ($validator->fails()) {
            return redirect('taskGroups/create')
                    ->withErrors($validator)
                    ->withInput();
        } else {
            $this->taskGroup->groupName = $request->input('groupName');
            $this->taskGroup->bgColor = $request->input('bgColor');
            $this->taskGroup->fontColor = $request->input('fontColor');
            $this->taskGroup->save();

            return redirect('/taskGroups');
        }//end if
    }
/*
    public function show($id)
    {
        $data = $this->task->where('id', $id)->first();

        return view('tasks/show', ['task' => $data]);
    }

    public function edit($id)
    {
        $data = $this->task->where('id', $id)->first();

        return view('tasks/edit', ['task' => $data]);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
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
        }//end if
    }

    public function delete($id)
    {
        $this->task->where('id', $id)->delete();
        return redirect('/');
    }

    public function calendar()
    {
        $tasks = $this->task->all();

        return view('tasks/calendar', ['tasks' => $tasks]);
    } */
}
/*
Verb	        URI	                    Action	    Route Name
GET	            /photos	                index	    photos.index
GET	            /photos/create	        create	    photos.create
POST	        /photos	                store	    photos.store
GET	            /photos/{photo}	        show	    photos.show
GET	            /photos/{photo}/edit	edit	    photos.edit
PUT/PATCH	    /photos/{photo}	        update	    photos.update
*/
