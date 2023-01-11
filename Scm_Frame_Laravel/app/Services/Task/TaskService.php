<?php

namespace App\Services\Task;

use App\Contracts\Dao\Task\TaskDaoInterface;
use App\Contracts\Services\Task\TaskServiceInterface;
use App\Http\Requests\TaskRequest;

/**
 * Service class for post.
 */
class TaskService implements TaskServiceInterface
{
    /**
     * post dao
     */
    private $taskDao;
    /**
     * Class Constructor
     * @param PostDaoInterface
     * @return
     */
    public function __construct(TaskDaoInterface $taskDao)
    {
        $this->taskDao = $taskDao;
    }
    /**
     * To get task list
     * @return array $task Task list
     */
    public function index()
    {
        return $this->taskDao->index();
    }

    /**
     * To save task
     * @param TaskDaoInterface $request request with inputs
     * @return Object $task saved task
     */
    public function store(TaskRequest $request)
    {
        return $this->taskDao->store($request);
    }

    /**
     * To get task by id
     * @param string $id task id
     * @return Object $task task object
     */
    public function edit($id)
    {
        return $this->taskDao->edit($id);
    }

    /**
     * To update task by id
     * @param TaskDaoInterface $request request with inputs
     * @param string $id Task id
     * @return Object $task Task Object
     */
    public function update($request, $id)
    {
        return $this->taskDao->update($request, $id);
    }

    /**
     * To delete task by id
     * @param string $id task id
     * @param string $id deleted task id
     */
    public function destroy($id)
    {
        return $this->taskDao->destroy($id);
    }
}
