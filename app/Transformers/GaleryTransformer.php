<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\Galery;

/**
 * Class GaleryTransformer.
 *
 * @package namespace App\Transformers;
 */
class GaleryTransformer extends TransformerAbstract
{
    /**
     * Transform the Galery entity.
     *
     * @param \App\Entities\Galery $model
     *
     * @return array
     */
    public function transform(Galery $model)
    {
        return [
            'id'         => $model->id,
            'image'      => asset($model->image),
            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
