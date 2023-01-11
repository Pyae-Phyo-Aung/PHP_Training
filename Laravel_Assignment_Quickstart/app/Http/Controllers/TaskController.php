<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use App\Models\Task;

class TaskController extends Controller
{
    public function create()
    {
        $tasks = Task::all();
        return view('tasks', compact('tasks'));
    }

    public function store(TaskRequest $request)
    {
        $task = new Task;
        $task->name = request('name');
        $task->save();
        return redirect('/');
    }

    public function destroy($id)
    {
        $task = Task::find($id);
        $task->delete();
        return redirect('/');
    }

    public function edit($id)
    {
        $task = Task::find($id);
        return view('edit', compact('task'));
    }

    public function update(TaskRequest $request,$id)
    {
        $task = Task::find($id);
        $task->name = request('name');
        $task->update();
        return redirect('/');
    }
}
