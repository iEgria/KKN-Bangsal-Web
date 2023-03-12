<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Interfaces\UmkmRepository;
use App\Entities\Umkm;
use App\Validators\UmkmValidator;

/**
 * Class UmkmRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class UmkmRepositoryEloquent extends BaseRepository implements UmkmRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Umkm::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return UmkmValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
