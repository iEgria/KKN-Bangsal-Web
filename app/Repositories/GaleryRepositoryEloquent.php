<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Interfaces\GaleryRepository;
use App\Entities\Galery;
use App\Presenters\GaleryPresenter;

class GaleryRepositoryEloquent extends BaseRepository implements GaleryRepository
{
    public function model()
    {
        return Galery::class;
    }

    public function presenter()
    {
        return GaleryPresenter::class;
    }

    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
