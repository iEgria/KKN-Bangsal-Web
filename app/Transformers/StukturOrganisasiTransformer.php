<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\StukturOrganisasi;

/**
 * Class StukturOrganisasiTransformer.
 *
 * @package namespace App\Transformers;
 */
class StukturOrganisasiTransformer extends TransformerAbstract
{
    /**
     * Transform the StukturOrganisasi entity.
     *
     * @param \App\Entities\StukturOrganisasi $model
     *
     * @return array
     */
    public function transform(StukturOrganisasi $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
