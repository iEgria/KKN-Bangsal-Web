<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Interfaces\UmkmRepository;
use App\Entities\Umkm;
use App\Presenters\UmkmPresenter;
use App\Validators\UmkmValidator;

class UmkmRepositoryEloquent extends BaseRepository implements UmkmRepository
{
    public function model()
    {
        return Umkm::class;
    }

    public function presenter()
    {
        return UmkmPresenter::class;
    }

    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
