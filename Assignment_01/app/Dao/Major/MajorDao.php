<?php

namespace App\Dao\Major;

use App\Models\Major;
use App\Contracts\Dao\Major\MajorDaoInterface;
use App\Http\Requests\MajorRequest;

/**
 * Data accessing object for post
 */
class MajorDao implements MajorDaoInterface
{
       /**
     * To get major list
     * @return $majors
     */
    public function index()
    {
        $majors =  Major::all();
        return $majors;
    }

        /**
     * To save Major
     * @param MajorRequest $request request with inputs
     * @return Object $major saved major
     */
    public function store(MajorRequest $request)
    {
        $name = request()->name;
        Major::create([
            'name' => $name
        ]);
        return $name;
    }

    /**
     * To edit major by id
     * @param string $id major id
     * * @return Object $major saved major
     */
    public function edit($id)
    {
        $major = Major::where('id', $id)->first();
        return $major;
    }

    /**
     * To update major by id
     * @param MajorRequest $request request with inputs
     * @param string $id major id
     * @return Object $major Major Object
     */
    public function update($request, $id)
    {
        $name = $request->name;
        Major::where('id', $id)->update([
            'name' => $name
        ]);
        return $name;
    }

    /**
     * To delete major by id
     * @param string $id major id
     * @param string $id deleted major id
     */
    public function destroy($id)
    {
        $msg = Major::where('id', $id)->delete();
        return $msg;
    }
}
