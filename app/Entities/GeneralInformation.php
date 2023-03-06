<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class GeneralInformation.
 *
 * @package namespace App\Entities;
 */
class GeneralInformation extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'general_information';
    protected $fillable = ['email', 'phone', 'instagram', 'sejarah_desa', 'visi_misi'];
}
