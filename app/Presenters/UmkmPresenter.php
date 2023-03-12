<?php

namespace App\Presenters;

use App\Transformers\UmkmTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class UmkmPresenter.
 *
 * @package namespace App\Presenters;
 */
class UmkmPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new UmkmTransformer();
    }
}
