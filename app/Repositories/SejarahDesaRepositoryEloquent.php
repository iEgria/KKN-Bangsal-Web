<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Interfaces\SejarahDesaRepository;
use App\Entities\SejarahDesa;
use App\Validators\SejarahDesaValidator;

/**
 * Class SejarahDesaRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class SejarahDesaRepositoryEloquent extends BaseRepository implements SejarahDesaRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return SejarahDesa::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return SejarahDesaValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
