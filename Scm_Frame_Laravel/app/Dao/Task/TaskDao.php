<?php

namespace App\Dao\Task;

use App\Contracts\Dao\Task\TaskDaoInterface;
use App\Http\Requests\TaskRequest;
use App\Models\Task;

/**
 * Data accessing object for task
 */
class TaskDao implements TaskDaoInterface
{
    /**
     * To get task list
     * @return array $task Task list
     */
    public function index()
    {
        $datas = Task::all();
        return $datas;
    }

    /**
     * To save task
     * @param TaskDaoInterface $request request with inputs
     * @return Object $task saved task
     */
    public function store(TaskRequest $request)
    {
        $name = request()->name;
        Task::create([
            'name' => $name,
        ]);
        return $name;
    }

    /**
     * To get task by id
     * @param string $id task id
     * @return Object $task task object
     */
    public function edit($id)
    {
        $data = Task::where('id', $id)->first();
        return $data;
    }

    /**
     * To update task by id
     * @param TaskDaoInterface $request request with inputs
     * @param string $id Task id
     * @return Object $task Task Object
     */
    public function update($request, $id)
    {
        $name = $request->name;
        Task::where('id', $id)->update([
            'name' => $name,
        ]);
        return $name;
    }

    /**
     * To delete task by id
     * @param string $id task id
     * @param string $id deleted task id
     */
    public function destroy($id)
    {
        $msg = Task::where('id', $id)->delete();
        return $msg;
    }
}
