<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Umkm.
 *
 * @package namespace App\Entities;
 */
class Umkm extends Model implements Transformable
{
    use TransformableTrait, HasUuids;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = ['umkm'];
    protected $fillable = ['pemilik', 'usaha', 'alamat', 'no_telp', 'photo'];
}
