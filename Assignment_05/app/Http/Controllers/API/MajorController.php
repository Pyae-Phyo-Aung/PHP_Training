<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Contracts\Services\Major\MajorServiceInterface;
use App\Http\Requests\MajorRequest;
use App\Models\Major;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class MajorController extends Controller
{
    private $majorInterface;

    public function __construct(MajorServiceInterface $majorServiceInterface)
    {
        $this->majorInterface = $majorServiceInterface;
    }

      /**
     * To get major list
     * @return $majors
     */
    public function index()
    {
        $major = Major::all();
        return response()->json($major, 200);
    }

      /**
     * To save Major
     * @param MajorRequest $request request with inputs
     * @return Object $major saved major
     */
    public function store(Request $request)
    {
        $messages = [
            'required' => 'The :attribute field is required',
        ];
        $validator = Validator::make($request->all(), [
            'name' => 'required',
        ], $messages);

        if ($validator->fails()) {
            return response()->json(['msg' => $validator->errors()], 200);
        } else {
            $major = Major::create([
                'name' => $request->name,
            ]);
            return response()->json(['major' => $major, 'msg' => 'Successfully created new major.'], 200);
        }
    }
    /**
     * To edit major by id
     * @param string $id major id
     * * @return Object $major saved major
     */
    public function edit($id)
    {
        $major = $this->majorInterface->edit($id);
        return response()->json($major, 200);
    }

    /**
     * To update major by id
     * @param MajorRequest $request request with inputs
     * @param string $id major id
     * @return Object $major Major Object
     */
    public function update(Request $request,$id)
    {
        $messages = [
            'required' => 'The :attribute field is required',
        ];
        $validator = Validator::make($request->all(), [
            'name' => 'required',
        ], $messages);

        if ($validator->fails()) {
            return response()->json(['msg' => $validator->errors()], 200);
        } else {
            $major = Major::findOrFail($id);
            $major->update([
                'name' => $request->name,
            ]);
            return response()->json(['major' => $major, 'msg' => 'Successfully update.'], 200);
        }
    }

     /**
     * To delete major by id
     * @param string $id major id
     * @param string $id deleted major id
     */
     public function destroy($id)
     {
         $this->majorInterface->destroy($id);
         return response()->json(['msg' => 'Successfully deleted.'], 200);
     }
}
