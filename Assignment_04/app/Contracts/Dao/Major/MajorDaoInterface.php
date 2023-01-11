<?php

namespace App\Contracts\Dao\Major;

use App\Http\Requests\MajorRequest;

/**
 * Interface for Data Accessing Object of Major
 */
interface MajorDaoInterface
{
   /**
     * To get major list
     * @return $majors
     */
    public function index();

    /**
     * To save Major
     * @param MajorRequest $request request with inputs
     * @return Object $major saved major
     */
    public function store(MajorRequest $request);

    /**
     * To edit major by id
     * @param string $id major id
     * * @return Object $major saved major
     */
    public function edit($id);

    
    /**
     * To update major by id
     * @param MajorRequest $request request with inputs
     * @param string $id major id
     * @return Object $major Major Object
     */
    public function update($request, $id);

    /**
     * To delete major by id
     * @param string $id major id
     * @param string $id deleted major id
     */
    public function destroy($id);
}
