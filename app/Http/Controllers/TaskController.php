<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        return view('tasks/list');
    }

    public function create()
    {
        return view('tasks/create');
    }

    public function store()
    {

    }

    public function show()
    {

    }

    public function edit()
    {

    }

    public function update()
    {

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
