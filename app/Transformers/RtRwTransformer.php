<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\RtRw;

/**
 * Class RtRwTransformer.
 *
 * @package namespace App\Transformers;
 */
class RtRwTransformer extends TransformerAbstract
{
    /**
     * Transform the RtRw entity.
     *
     * @param \App\Entities\RtRw $model
     *
     * @return array
     */
    public function transform(RtRw $model)
    {
        return [
            'id'         => $model->id,
            'rt_rw_id'   => $model->rt_rw_id,
            'rt_number'  => $model->rt_number,
            'rw_number'  => $model->rw_number,
            'nama'       => $model->nama,
            'rt'         => $model->rt
        ];
    }
}
