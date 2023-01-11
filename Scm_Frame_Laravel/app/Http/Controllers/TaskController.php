<?php

namespace App\Http\Controllers;

use App\Contracts\Services\Task\TaskServiceInterface;
use App\Http\Requests\TaskRequest;

/**
 * This is Task controller.
 * This handles Task CRUD processing.
 */
class TaskController extends Controller
{
    /**
     * task interface
     */
    private $taskInterface;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(TaskServiceInterface $taskServiceInterface)
    {
        $this->taskInterface = $taskServiceInterface;
    }

   /**
     * To get task list
     * @return array $task Task list
     */
    public function index()
    {
        $tasks = $this->taskInterface->index();
        return view('tasks', compact('tasks'));
    }

      /**
     * To save task
     * @param TaskDaoInterface $request request with inputs
     * @return Object $task saved task
     */
    public function store(TaskRequest $request)
    {
        $this->taskInterface->store($request);
        return redirect('/');
    }

    /**
     * To get task by id
     * @param string $id task id
     * @return Object $task task object
     */
    public function edit($id)
    {
        $task = $this->taskInterface->edit($id);
        return view('edit', compact('task'));
    }

    /**
     * To update task by id
     * @param TaskDaoInterface $request request with inputs
     * @param string $id Task id
     * @return Object $task Task Object
     */
    public function update(TaskRequest $request, $id)
    {
        $this->taskInterface->update($request, $id);
        return redirect('/');
    }

   /**
     * To delete task by id
     * @param string $id task id
     * @param string $id deleted task id
     */
    public function destroy($id)
    {
        $this->taskInterface->destroy($id);
        return redirect('/');
    }
}
