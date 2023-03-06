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
            'email'      => $model->email,
            'phone'      => $model->phone,
            'instagram'  => $model->instagram,
            'sejarah_desa'  => $model->sejarah_desa,
            'visi_misi'  => $model->visi_misi,
            'updated_at' => $model->updated_at
        ];
    }
}
