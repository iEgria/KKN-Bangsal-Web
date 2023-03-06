<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\SejarahDesa;

/**
 * Class SejarahDesaTransformer.
 *
 * @package namespace App\Transformers;
 */
class SejarahDesaTransformer extends TransformerAbstract
{
    /**
     * Transform the SejarahDesa entity.
     *
     * @param \App\Entities\SejarahDesa $model
     *
     * @return array
     */
    public function transform(SejarahDesa $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
