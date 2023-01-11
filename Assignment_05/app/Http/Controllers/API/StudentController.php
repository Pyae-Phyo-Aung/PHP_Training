<?php

namespace App\Http\Controllers\API;

use App\Contracts\Services\Student\StudentServiceInterface;
use App\Http\Controllers\Controller;
use App\Models\Major;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

/**
 * This is Student controller.
 * This handles Student CRUD processing.
 */
class StudentController extends Controller
{
    /**
   * student interface
   */
    private $studentInterface;

      /**
   * Create a new controller instance.
   *
   * @return void
   */
    public function __construct(StudentServiceInterface $studentServiceInterface)
    {
        $this->studentInterface = $studentServiceInterface;
    }
  /**
   * To show student list
   *
   * @return $student
   */
    public function index()
    {
        $students = Student::with('major')->get();
        return response()->json($students, 200);
    }


  /**
   * To store student create view
   * @param Request $request
   * @return $student $major msg
   */
    public function store(Request $request)
    {
        $messages = [
            'required' => 'The :attribute field is required',
        ];
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'major' => 'required',
            'address' => 'required',
        ], $messages);

        if ($validator->fails()) {
            return response()->json(['msg' => $validator->errors()], 200);
        } else {
            $student = Student::create([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'major_id' => $request->major,
                'address' => $request->address,
            ]);
            $major = Major::where('id', $request->major)->first();
            return response()->json(['major' => $major, 'student' => $student, 'msg' => 'Successfully created new student.'], 200);
        }
    }
    /**
     * To show student by id
     * @param string $id student id
     * @return Object $student student
     * @return Object $major student
     * @return $student $major
     */
    public function show($id)
    {
        $student = $this->studentInterface->show($id);
        $major = Major::where('id', $student->major_id)->first();
        return response()->json(['major' => $major, 'student' => $student, 'msg' => 'Successfully update.'], 200);
    }

    /**
     * To edit student by id
     * @param string $id student id
     * @return Object $student
     * @return $student $major
     */
    public function edit($id)
    {
        $student = $this->studentInterface->edit($id);
        return response()->json($student, 200);
    }

    /**
     * To update student by id
     * @param Request $request request with inputs
     * @param string $id student id
     * @return Object $student Student Object
     * @return Object $major Major Object
     */
    public function update(Request $request, $id)
    {
        $messages = [
            'required' => 'The :attribute field is required',
        ];
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'major' => 'required',
            'address' => 'required',
        ], $messages);

        if ($validator->fails()) {
            return response()->json(['msg' => $validator->errors()], 200);
        } else {
            $student = Student::findOrFail($id);
            $student->update([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'major_id' => $request->major,
                'address' => $request->address,
            ]);
            $major = Major::where('id', $request->major)->first();
            return response()->json(['major' => $major, 'msg' => 'Successfully update.'], 200);
        }
    }

    /**
     * To delete student by id
     * @param string $id student id
     * @param string $id deleted student id
     */
    public function destroy($id)
    {
        $this->studentInterface->destroy($id);
        return response()->json(['msg' => 'Successfully deleted.'], 200);
    }
}
