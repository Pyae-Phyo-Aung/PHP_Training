<?php

namespace App\Contracts\Dao\Task;

use App\Http\Requests\TaskRequest;

/**
 * Interface for Data Accessing Object of Post
 */
interface TaskDaoInterface
{
    /**
     * To get task list
     * @return $tasks
     */
    public function index();
    /**
     * To save Task
     * @param TaskRequest $request request with inputs
     * @return Object $task saved task
     */
    public function store(TaskRequest $request);

    /**
     * To edit task by id
     * @param string $id task id
     */
    public function edit($id);

    /**
     * To update post by id
     * @param TaskRequest $request request with inputs
     * @param string $id task id
     * @return Object $task Task Object
     */
    public function update($request, $id);

    /**
     * To delete task by id
     * @param string $id task id
     * @param string $id deleted task id
     */
    public function destroy($id);
}
