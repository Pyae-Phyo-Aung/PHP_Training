<?php

namespace App\Services\Student;

use App\Contracts\Dao\Student\StudentDaoInterface;
use App\Contracts\Services\Student\StudentServiceInterface;
use App\Http\Requests\StudentRequest;

/**
 * Service class for post.
 */
class StudentService implements StudentServiceInterface
{
        /**
     * post dao
     */
    private $studentdao;
    /**
     * Class Constructor
     * @param PostDaoInterface
     * @return
     */
    public function __construct(StudentDaoInterface $studentdao)
    {
        $this->studentdao = $studentdao;
    }
     /**
     * To get student list
     * @return $students
     */
    public function index()
    {
        return $this->studentdao->index();
    }

    /**
     * To save student
     * @param StudentRequest $request request with inputs
     * @return Object $student saved student
     */
    public function store(StudentRequest $request)
    {
        return $this->studentdao->store($request);
    }
     /**
     * To edit student by id
     * @param string $id student id
     */
    public function show($id)
    {
        return $this->studentdao->show($id);
    }

     /**
     * To edit student by id
     * @param string $id student id
     * * @return Object $student saved student
     */
    public function edit($id)
    {
        return $this->studentdao->edit($id);
    }

     /**
     * To update student by id
     * @param StudentRequest $request request with inputs
     * @param string $id student id
     * @return Object $student Student Object
     */
    public function update($request, $id)
    {
        return $this->studentdao->update($request, $id);
    }

     /**
     * To delete student by id
     * @param string $id student id
     * @param string $id deleted student id
     */
    public function destroy($id)
    {
        return $this->studentdao->destroy($id);
    }
}
