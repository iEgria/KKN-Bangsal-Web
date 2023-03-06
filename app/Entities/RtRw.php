<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class RtRw.
 *
 * @package namespace App\Entities;
 */
class RtRw extends Model implements Transformable
{
    use TransformableTrait, HasUuids;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'rt_rw';
    protected $fillable = ['rt_rw_id', 'rt_number', 'rw_number', 'nama'];

    public function rt()
    {
        return $this->hasMany(RtRw::class);
    }
}
