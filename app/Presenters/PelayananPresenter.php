<?php

namespace App\Presenters;

use App\Transformers\PelayananTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class PelayananPresenter.
 *
 * @package namespace App\Presenters;
 */
class PelayananPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new PelayananTransformer();
    }
}
