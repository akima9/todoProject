<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    private $user;
    private $messages;

    public function __construct()
    {
        $this->user = new User;
        $this->messages = [
            'userId.required' => '제목을 입력해주세요.',
            'userId.max' => '제목은 10자 이하로 입력해주세요.',
            'userPw.required' => '비밀번호를 입력해주세요.',
        ];
    }

    /* public function index()
    {
        $tasks = $this->task->orderBy('start', 'asc')->get();

        return view('tasks/list', ['tasks' => $tasks]);
    } */

    public function create()
    {
        return view('users/create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'userId' => 'required|max:20',
            'userPw' => 'required',
        ], $this->messages);

        if ($validator->fails()) {
            return redirect('users/create')
                    ->withErrors($validator)
                    ->withInput();
        } else {
            $this->user->userId = $request->input('userId');
            $this->user->userPw = Hash::make($request->input('userPw'));
            $this->user->save();

            return redirect('/');
        }//end if
    }
/*
    public function show($id)
    {
        $task = $this->task->where('id', $id)->first();
        $taskGroup = $this->taskGroup->where('id', $task->group)->first();

        return view('tasks/show', ['task' => $task, 'taskGroup' => $taskGroup]);
    }

    public function edit($id)
    {
        $task = $this->task->where('id', $id)->first();
        $getTaskGroup = $this->taskGroup->where('id', $task->group)->first();
        $listTaskGroup = $this->taskGroup->all();

        return view('tasks/edit', ['task' => $task, 'getTaskGroup' => $getTaskGroup, 'listTaskGroups' => $listTaskGroup]);
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
                    'group' => $request->input('taskGroup'),
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
