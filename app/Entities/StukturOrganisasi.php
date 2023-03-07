<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class StukturOrganisasi.
 *
 * @package namespace App\Entities;
 */
class StukturOrganisasi extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'stuktur_organisasi';
    protected $fillable = ['image'];
}
