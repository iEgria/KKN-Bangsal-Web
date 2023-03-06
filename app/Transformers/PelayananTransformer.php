<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\Pelayanan;

/**
 * Class PelayananTransformer.
 *
 * @package namespace App\Transformers;
 */
class PelayananTransformer extends TransformerAbstract
{
    /**
     * Transform the Pelayanan entity.
     *
     * @param \App\Entities\Pelayanan $model
     *
     * @return array
     */
    public function transform(Pelayanan $model)
    {
        return [
            'id'         => $model->id,
            'nama' => $model->nama,
            'syarat' => $model->syarat,
            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
