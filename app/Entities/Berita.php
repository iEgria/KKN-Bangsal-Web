<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Berita.
 *
 * @package namespace App\Entities;
 */
class Berita extends Model implements Transformable
{
    use TransformableTrait, HasUuids, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'berita';
    protected $fillable = ['title', 'slug', 'cover', 'content', 'view', 'published_at'];
}
