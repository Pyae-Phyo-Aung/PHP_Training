<?php

namespace App\Http\Controllers;

use App\Contracts\Services\Student\StudentServiceInterface;
use App\Http\Requests\StudentRequest;
use App\Http\Requests\SearchRequest;
use App\Models\Student;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    private $studentInterface;

    public function __construct(StudentServiceInterface $studentServiceInterface)
    {
        $this->studentInterface = $studentServiceInterface;
    }

    /**
     * To get student list
     * @return $students
     */
    public function index()
    {
        $students = $this->studentInterface->index();
        return view('students.index', compact('students'));
    }

    /**
     * To save student
     * @param StudentRequest $request request with inputs
     * @return Object $student saved student
     */
    public function create()
    {
        return view('students.create');
    }
    /**
     * To edit student by id
     * @param string $id student id
     */
    public function store(StudentRequest $request)
    {
        $this->studentInterface->store($request);
        return redirect(route('student.index'));
    }
    /**
     * To edit student by id
     * @param string $id student id
     * * @return Object $student saved student
     */
    public function show($id)
    {
        $student = $this->studentInterface->show($id);
        return view('students.detail', compact('student'));
    }
    //search 
    public function search(SearchRequest $request)
    {
        $name = $request->search;
        $email = $request->search;
        $major = $request->search;
        $students = Student::where('name','like','%'. $name.'%')->orWhere('email','like','%'.$email.'%')->orWhere('major','like','%'.$major.'%')->get();
        return view('students.index',compact('students'));
    }
    /**
     * To edit student by id
     * @param string $id student id
     * * @return Object $student saved student
     */
    public function edit($id)
    {
        $student = $this->studentInterface->edit($id);
        return view('students.edit', compact('student'));
    }
    /**
     * To update student by id
     * @param StudentRequest $request request with inputs
     * @param string $id student id
     * @return Object $student Student Object
     */
    public function update(StudentRequest $request, $id)
    {
        $this->studentInterface->update($request, $id);
        return redirect(route('student.index'));
    }
    /**
     * To delete student by id
     * @param string $id student id
     * @param string $id deleted student id
     */
    public function destroy($id)
    {
        $this->studentInterface->destroy($id);
        return redirect(route('student.index'));
    }
}
