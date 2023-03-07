<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\Berita;
use Carbon\Carbon;

/**
 * Class BeritaTransformer.
 *
 * @package namespace App\Transformers;
 */
class BeritaTransformer extends TransformerAbstract
{
    /**
     * Transform the Berita entity.
     *
     * @param \App\Entities\Berita $model
     *
     * @return array
     */
    public function transform(Berita $model)
    {
        return [
            'id' => $model->id,
            'title' => $model->title,
            'slug' => $model->slug,
            'url' => url('berita/' . $model->slug),
            'cover' => asset('storage/' . $model->cover),
            'content' => $model->content,
            'content_short' => substr(strip_tags($model->content), 0, 180),
            'view' => $model->view,
            'published_at' =>  $model->published_at,
            'published_at_human_date' => Carbon::parse($model->published_at)->format('d F Y'),
            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
