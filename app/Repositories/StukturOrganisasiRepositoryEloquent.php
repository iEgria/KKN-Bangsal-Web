<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Interfaces\StukturOrganisasiRepository;
use App\Entities\StukturOrganisasi;
use App\Presenters\StukturOrganisasiPresenter;
use App\Validators\StukturOrganisasiValidator;

class StukturOrganisasiRepositoryEloquent extends BaseRepository implements StukturOrganisasiRepository
{
    public function model()
    {
        return StukturOrganisasi::class;
    }

    public function validator()
    {
        return StukturOrganisasiValidator::class;
    }

    public function presenter()
    {
        return StukturOrganisasiPresenter::class;
    }

    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
