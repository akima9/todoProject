<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use Illuminate\Support\Facades\Validator;

class TaskController extends Controller
{
    private $task;
    private $messages;

    public function __construct()
    {
        $this->task = new Task;
        $this->messages = [
            'title.required' => '제목을 입력해주세요.',
            'title.max' => '제목은 50자 이하로 입력해주세요.',
            'contents.required' => '내용을 입력해주세요.',
        ];
    }

    public function index()
    {
        $tasks = $this->task->all();

        return view('tasks/list', ['tasks' => $tasks]);
    }

    public function create()
    {
        return view('tasks/create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:50',
            'contents' => 'required',
            'start' => 'required',
            'end' => 'required',
        ], $this->messages);

        if ($validator->fails()) {
            return redirect('tasks/create')
                    ->withErrors($validator)
                    ->withInput();
        } else {
            $this->task->title = $request->input('title');
            $this->task->contents = $request->input('contents');
            $this->task->start = $request->input('start');
            $this->task->end = $request->input('end');
            $this->task->save();

            return redirect('/');
        }//end if
    }

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
    }

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
