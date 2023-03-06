<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Interfaces\PelayananRepository;
use App\Entities\Pelayanan;
use App\Presenters\PelayananPresenter;
use App\Validators\PelayananValidator;

class PelayananRepositoryEloquent extends BaseRepository implements PelayananRepository
{
    public function model()
    {
        return Pelayanan::class;
    }

    public function validator()
    {
        return PelayananValidator::class;
    }

    public function presenter()
    {
        return PelayananPresenter::class;
    }

    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
