<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\GeneralInformation;

/**
 * Class GeneralInformationTransformer.
 *
 * @package namespace App\Transformers;
 */
class GeneralInformationTransformer extends TransformerAbstract
{
    /**
     * Transform the GeneralInformation entity.
     *
     * @param \App\Entities\GeneralInformation $model
     *
     * @return array
     */
    public function transform(GeneralInformation $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
