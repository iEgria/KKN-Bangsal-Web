<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Interfaces\SliderRepository;
use App\Entities\Slider;
use App\Presenters\SliderPresenter;

class SliderRepositoryEloquent extends BaseRepository implements SliderRepository
{
    public function model()
    {
        return Slider::class;
    }

    public function presenter()
    {
        return SliderPresenter::class;
    }

    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
