<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Interfaces\beritaRepository;
use App\Entities\Berita;
use App\Presenters\BeritaPresenter;
use App\Validators\BeritaValidator;

class BeritaRepositoryEloquent extends BaseRepository implements BeritaRepository
{
    public function model()
    {
        return Berita::class;
    }

    public function presenter()
    {
        return BeritaPresenter::class;
    }

    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
