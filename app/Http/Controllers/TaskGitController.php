<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class TaskGitController extends Controller
{
    public function index()
    {
        $response = Http::withHeaders([
            'Accept' => 'application/vnd.github.v3+json',
        ])->get('https://api.github.com/repos/akima9/todoproject/commits');

        if ($response->ok()) {
            $resData = $response->body();
        } else {
            //불러오기 실패시
        }//end if
        $resData = json_decode($resData);

        return view('taskGits/list', ['datas' => $resData]);
    }//end index
}
