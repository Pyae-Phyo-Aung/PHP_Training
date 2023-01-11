<?php

namespace App\Contracts\Dao\Student;
use App\Http\Requests\StudentRequest;

/**
 * Interface for Data Accessing Object of Post
 */
interface StudentDaoInterface
{
        /**
     * To get student list
     * @return $students
     */
    public function index();

     /**
     * To save student
     * @param StudentRequest $request request with inputs
     * @return Object $student saved student
     */
    public function store(StudentRequest $request);

     /**
     * To edit student by id
     * @param string $id student id
     */
    public function show($id);

    /**
     * To edit student by id
     * @param string $id student id
     * * @return Object $student saved student
     */
    public function edit($id);

    /**
     * To update student by id
     * @param StudentRequest $request request with inputs
     * @param string $id student id
     * @return Object $student Student Object
     */
    public function update($request, $id);

     /**
     * To delete student by id
     * @param string $id student id
     * @param string $id deleted student id
     */
    public function destroy($id);
}
