<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class RelatedLink extends Model implements Transformable
{
    use TransformableTrait, HasUuids;

    protected $table = 'related_link';
    protected $fillable = ['title', 'url', 'logo'];
}
