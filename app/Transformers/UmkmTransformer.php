<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\Umkm;

/**
 * Class UmkmTransformer.
 *
 * @package namespace App\Transformers;
 */
class UmkmTransformer extends TransformerAbstract
{
    /**
     * Transform the Umkm entity.
     *
     * @param \App\Entities\Umkm $model
     *
     * @return array
     */
    public function transform(Umkm $model)
    {
        return [
            'id' => $model->id,
            'photo' => asset($model->photo),
            'pemilik' => $model->pemilik,
            'usaha' => $model->usaha,
            'alamat' => $model->alamat,
            'no_telp' => $model->no_telp,
            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
