<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\RelatedLink;


/**
 * Class RelatedLinkTransformer.
 *
 * @package namespace App\Transformers;
 */
class RelatedLinkTransformer extends TransformerAbstract
{
    /**
     * Transform the RelatedLink entity.
     *
     * @param \App\Entities\RelatedLink $model
     *
     * @return array
     */
    public function transform(RelatedLink $model)
    {
        return [
            'id'         => $model->id,
            'title'      => $model->title,
            'url'        => $model->url,
            'logo'       => ($model->logo ? asset($model->logo) : url('favicon.png')),
            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
