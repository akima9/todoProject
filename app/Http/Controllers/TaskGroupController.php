<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TaskGroup;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

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
        $data = $this->taskGroup->where('writer_id', Auth::id())->get();
        return view('taskGroups/list', ['taskGroups' => $data]);
    }//end index

    public function create($option)
    {
        return view('taskGroups/create', ['option' => $option]);
    }//end create

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
            $this->taskGroup->writer_id = Auth::id();
            $this->taskGroup->groupName = $request->input('groupName');
            $this->taskGroup->bgColor = $request->input('bgColor');
            $this->taskGroup->fontColor = $request->input('fontColor');
            $this->taskGroup->save();

            if ($request->input('option') === 'N') { // 그룹 추가 메뉴에서 추가한 경우
                return redirect('/taskGroups');
            } else { // 할일 추가에서 그룹 추가한 경우
                return redirect('tasks/create');
            }//end if
        }//end if
    }//end store

    public function show($id)
    {
        $taskGroup = $this->taskGroup->where('id', $id)->first();

        if ($this->authorize('view', $taskGroup)) {
            return view('taskGroups/show', ['taskGroup' => $taskGroup]);
        }//end if
    }//end show

    public function edit($id)
    {
        $taskGroup = $this->taskGroup->where('id', $id)->first();

        if ($this->authorize('view', $taskGroup)) {
            return view('taskGroups/edit', ['taskGroup' => $taskGroup]);
        }//end if
    }//end edit

    public function update(Request $request, $id)
    {
        $taskGroup = $this->taskGroup->where('id', $id)->first();

        if ($this->authorize('view', $taskGroup)) {
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

                // return redirect('taskGroups/'.$id);
                return redirect('/taskGroups');
            }//end if
        }//end if
    }//end update

    public function delete($id)
    {
        $taskGroup = $this->taskGroup->where('id', $id)->first();

        if ($this->authorize('view', $taskGroup)) {
            $this->taskGroup->where('id', $id)->delete();
            return redirect('/taskGroups');
        }//end if
    }//end delete
}//end class
