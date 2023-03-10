<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Interfaces\BeritaRepository;
use App\Entities\Berita;
use App\Presenters\BeritaPresenter;

class BeritaRepositoryEloquent extends BaseRepository implements BeritaRepository
{
    protected $fieldSearchable = [
        'title' => 'like',
        'content' => 'like',
    ];

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
