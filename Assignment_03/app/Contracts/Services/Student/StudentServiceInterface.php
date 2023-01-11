<?php

namespace App\Contracts\Services\Student;

use Illuminate\Http\Request;
use App\Http\Requests\StudentRequest;

/**
 * Interface for post service
 */
interface StudentServiceInterface
{


    /**
     * To get post list
     * @return array $postList Post list
     */
    public function index();

    public function store(StudentRequest $request);

    public function show($id);
     
    public function edit($id);

    public function update($request, $id);

    public function destroy($id);
}
