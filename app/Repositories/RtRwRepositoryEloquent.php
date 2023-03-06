<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Interfaces\RtRwRepository;
use App\Entities\RtRw;
use App\Presenters\RtRwPresenter;
use App\Validators\RtRwValidator;

class RtRwRepositoryEloquent extends BaseRepository implements RtRwRepository
{
    public function model()
    {
        return RtRw::class;
    }

    public function validator()
    {
        return RtRwValidator::class;
    }

    public function presenter()
    {
        return RtRwPresenter::class;
    }

    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
