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

    public function show($id)
    {
        $data = $this->taskGroup->where('id', $id)->first();

        return view('taskGroups/show', ['taskGroup' => $data]);
    }

    public function edit($id)
    {
        $data = $this->taskGroup->where('id', $id)->first();

        return view('taskGroups/edit', ['taskGroup' => $data]);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'groupName' => 'required|max:50',
            'bgColor' => 'required',
            'fontColor' => 'required',
        ], $this->messages);

        if ($validator->fails()) {
            return redirect('taskGroups/' . $id . '/edit')
                    ->withErrors($validator)
                    ->withInput();
        } else {

            $this->taskGroup->where('id', $id)
                ->update([
                    'groupName' => $request->input('groupName'),
                    'bgColor' => $request->input('bgColor'),
                    'fontColor' => $request->input('fontColor')]
                );

            return redirect('taskGroups/'.$id);
        }//end if
    }

    public function delete($id)
    {
        $this->taskGroup->where('id', $id)->delete();
        return redirect('/taskGroups');
    }
/*
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
