<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Pelayanan.
 *
 * @package namespace App\Entities;
 */
class Pelayanan extends Model implements Transformable
{
    use TransformableTrait, HasUuids;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'pelayanan';
    protected $fillable = ['nama', 'syarat'];
}
