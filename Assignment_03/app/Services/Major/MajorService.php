<?php

namespace App\Services\Major;

use App\Contracts\Dao\Major\MajorDaoInterface;
use App\Contracts\Services\Major\MajorServiceInterface;
use App\Http\Requests\MajorRequest;

/**
 * Service class for post.
 */
class MajorService implements MajorServiceInterface
{
    /**
     * post dao
     */
    private $majorDao;
    /**
     * Class Constructor
     * @param PostDaoInterface
     * @return
     */
    public function __construct(MajorDaoInterface $majorDao)
    {
        $this->majorDao = $majorDao;
    }
      /**
     * To get major list
     * @return $majors
     */
    public function index()
    {
        return $this->majorDao->index();
    }

        /**
     * To save Major
     * @param MajorRequest $request request with inputs
     * @return Object $major saved major
     */
    public function store(MajorRequest $request)
    {
        return $this->majorDao->store($request);
    }

    /**
     * To edit major by id
     * @param string $id major id
     * * @return Object $major saved major
     */
    public function edit($id)
    {
        return $this->majorDao->edit($id);
    }

    /**
     * To update major by id
     * @param MajorRequest $request request with inputs
     * @param string $id major id
     * @return Object $major Major Object
     */
    public function update($request, $id)
    {
        return $this->majorDao->update($request, $id);
    }

     /**
     * To delete major by id
     * @param string $id major id
     * @param string $id deleted major id
     */
    public function destroy($id)
    {
        return $this->majorDao->destroy($id);
    }
}
