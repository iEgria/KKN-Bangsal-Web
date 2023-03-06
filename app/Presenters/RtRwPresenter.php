<?php

namespace App\Presenters;

use App\Transformers\RtRwTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class RtRwPresenter.
 *
 * @package namespace App\Presenters;
 */
class RtRwPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new RtRwTransformer();
    }
}
