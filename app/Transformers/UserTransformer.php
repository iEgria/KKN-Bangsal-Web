<?php

namespace App\Transformers;

use App\Entities\User;
use League\Fractal\TransformerAbstract;

/**
 * Class UsersTransformer.
 *
 * @package namespace App\Transformers;
 */
class UserTransformer extends TransformerAbstract
{
    /**
     * Transform the Users entity.
     *
     * @param \App\Entities\Users $model
     *
     * @return array
     */
    public function transform(User $model)
    {
        return [
            'id'         => $model->id,
            'name'       => $model->name,
            'email'      => $model->email,
            'roles'      => $model->roles->pluck('name'),
            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
