<?php

namespace App\Dao\Student;

use App\Models\Student;
use App\Contracts\Dao\Student\StudentDaoInterface;
use App\Http\Requests\StudentRequest;

/**
 * Data accessing object for post
 */
class StudentDao implements StudentDaoInterface
{
   /**
     * To get student list
     * @return $students
     */
    public function index()
    {
        
        $students =  Student::all();
        return $students;
    }

     /**
     * To save student
     * @param StudentRequest $request request with inputs
     * @return Object $student saved student
     */
    public function store(StudentRequest $request)
    {
        $name = request()->name;
        $email = request()->email;
        $phone = request()->phone;
        $address = request()->address;
        $major = request()->major;
        Student::create([
            'name' => $name,
            'major_id' => $major,
            'email' => $email,
            'phone' => $phone,
            'address' => $address
        ]);
        return $name;
    }

    /**
     * To edit student by id
     * @param string $id student id
     */
    public function show($id)
    {
        $student = Student::where('id', $id)->first();
        return $student;
    }
     /**
     * To edit student by id
     * @param string $id student id
     * * @return Object $student saved student
     */
    public function edit($id)
    {
        $student = Student::where('id', $id)->first();
        return $student;
    }

    /**
     * To update student by id
     * @param StudentRequest $request request with inputs
     * @param string $id student id
     * @return Object $student Student Object
     */
    public function update($request, $id)
    {
        $name = request()->name;
        $email = request()->email;
        $phone = request()->phone;
        $address = request()->address;
        $major_id = request()->major;
        Student::where('id', $id)->update([
            'name' => $name,
            'email' => $email,
            'phone' => $phone,
            'major_id' => $major_id,
            'address' => $address
        ]);
        return $name;
    }

     /**
     * To delete student by id
     * @param string $id student id
     * @param string $id deleted student id
     */
    public function destroy($id)
    {
        $msg = Student::where('id', $id)->delete();
        return $msg;
    }
}
