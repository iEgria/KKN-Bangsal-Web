<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Entities\GeneralInformation;
use App\Interfaces\GeneralInformationRepository;
use App\Presenters\GeneralInformationPresenter;
use App\Validators\GeneralInformationValidator;

class GeneralInformationRepositoryEloquent extends BaseRepository implements GeneralInformationRepository
{
    public function model()
    {
        return GeneralInformation::class;
    }

    public function validator()
    {
        return GeneralInformationValidator::class;
    }

    public function presenter()
    {
        return GeneralInformationPresenter::class;
    }

    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
