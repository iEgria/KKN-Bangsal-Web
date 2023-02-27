<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\GeneralInformationRepository;
use App\Entities\GeneralInformation;
use App\Validators\GeneralInformationValidator;

/**
 * Class GeneralInformationRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class GeneralInformationRepositoryEloquent extends BaseRepository implements GeneralInformationRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return GeneralInformation::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return GeneralInformationValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
