<?php

namespace App\Presenters;

use App\Transformers\BeritaTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class BeritaPresenter.
 *
 * @package namespace App\Presenters;
 */
class BeritaPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new BeritaTransformer();
    }
}
