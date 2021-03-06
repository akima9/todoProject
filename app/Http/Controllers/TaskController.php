<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\TaskGroup;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    private $task;
    private $taskGroup;
    private $messages;

    public function __construct()
    {
        $this->task = new Task;
        $this->taskGroup = new TaskGroup;
        $this->messages = [
            'title.required' => '제목을 입력해주세요.',
            'title.max' => '제목은 50자 이하로 입력해주세요.',
            'contents.required' => '내용을 입력해주세요.',
        ];
    }

    public function index()
    {
        if(Auth::check()){ // 로그인 후
            $tasks = $this->task->where('writer_id', Auth::id())->orderBy('start', 'asc')->get();
            return view('tasks/list', ['tasks' => $tasks]);
        } else { // 로그인 전
            return view('auth/login');
        }//end if
    }//end index

    public function create()
    {
        $data = $this->taskGroup->where('writer_id', Auth::id())->get();
        return view('tasks/create', ['taskGroups' => $data]);
    }//end create

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
            $this->task->writer_id = Auth::id();
            $this->task->group = $request->input('taskGroup');
            $this->task->title = $request->input('title');
            $this->task->contents = $request->input('contents');
            $this->task->start = $request->input('start');
            $this->task->end = $request->input('end');
            $this->task->complete = 'N';
            $this->task->save();

            return redirect('tasks/calendar');
        }//end if
    }//end store

    public function show($id)
    {
        $task = $this->task->where('id', $id)->first();

        if ($this->authorize('view', $task)) {
            $taskGroup = $this->taskGroup->where('id', $task->group)->first();
            return view('tasks/show', ['task' => $task, 'taskGroup' => $taskGroup]);
        }//end if
    }//end show

    public function edit($id)
    {
        $task = $this->task->where('id', $id)->first();

        if ($this->authorize('view', $task)) {
            $getTaskGroup = $this->taskGroup->where('id', $task->group)->first();
            $listTaskGroup = $this->taskGroup->all();
            return view('tasks/edit', ['task' => $task, 'getTaskGroup' => $getTaskGroup, 'listTaskGroups' => $listTaskGroup]);
        }//end if
    }//end edit

    public function update(Request $request, $id)
    {
        $task = $this->task->where('id', $id)->first();

        if ($this->authorize('view', $task)) {
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
                        'group' => $request->input('taskGroup'),
                        'title' => $request->input('title'),
                        'contents' => $request->input('contents')]
                    );

                return redirect('tasks/'.$id);
            }//end if
        }//end if
    }//end update

    public function complete($id)
    {
        $task = $this->task->where('id', $id)->first();

        if ($this->authorize('view', $task)) {
            $this->task->where('id', $id)
                ->update([
                        'complete' => 'Y'
                    ]
                );

            return redirect('tasks/calendar');
        }//end if
    }//end complete

    public function completeRollBack($id)
    {
        $task = $this->task->where('id', $id)->first();

        if ($this->authorize('view', $task)) {
            $this->task->where('id', $id)
            ->update([
                    'complete' => 'N'
                ]
            );

            return redirect('tasks/calendar');
        }//end if
    }//end completeRollBack

    public function delete($id)
    {
        $task = $this->task->where('id', $id)->first();

        if ($this->authorize('view', $task)) {
            $this->task->where('id', $id)->delete();
            return redirect('/');
        }//end if
    }//end delete

    public function calendar()
    {
        return view('tasks/calendar');
    }//end calendar
}//end class

/*
Verb	        URI	                    Action	    Route Name
GET	            /photos	                index	    photos.index
GET	            /photos/create	        create	    photos.create
POST	        /photos	                store	    photos.store
GET	            /photos/{photo}	        show	    photos.show
GET	            /photos/{photo}/edit	edit	    photos.edit
PUT/PATCH	    /photos/{photo}	        update	    photos.update
*/
