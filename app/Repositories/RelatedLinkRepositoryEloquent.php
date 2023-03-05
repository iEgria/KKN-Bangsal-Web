<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Interfaces\RelatedLinkRepository;
use App\Entities\RelatedLink;
use App\Presenters\RelatedLinkPresenter;

class RelatedLinkRepositoryEloquent extends BaseRepository implements RelatedLinkRepository
{
    public function model()
    {
        return RelatedLink::class;
    }

    public function presenter()
    {
        return RelatedLinkPresenter::class;
    }

    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
