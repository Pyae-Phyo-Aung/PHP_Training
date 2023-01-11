<?php

namespace App\Http\Controllers;

use App\Contracts\Services\Major\MajorServiceInterface;
use App\Http\Requests\MajorRequest;

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
        $majors = $this->majorInterface->index();
        return view('majors.create', compact('majors'));
    }

      /**
     * To save Major
     * @param MajorRequest $request request with inputs
     * @return Object $major saved major
     */
    public function store(MajorRequest $request)
    {
        $this->majorInterface->store($request);
        return back();
    }

    /**
     * To edit major by id
     * @param string $id major id
     * * @return Object $major saved major
     */
    public function edit($id)
    {
        $major = $this->majorInterface->edit($id);
        return view('majors.edit', compact('major'));
    }

    /**
     * To update major by id
     * @param MajorRequest $request request with inputs
     * @param string $id major id
     * @return Object $major Major Object
     */
    public function update(MajorRequest $request,$id)
    {
        $this->majorInterface->update($request,$id);
        return redirect(route('major.index'));
    }

     /**
     * To delete major by id
     * @param string $id major id
     * @param string $id deleted major id
     */
     public function destroy($id)
     {
         $this->majorInterface->destroy($id);
         return back();
     }
}
