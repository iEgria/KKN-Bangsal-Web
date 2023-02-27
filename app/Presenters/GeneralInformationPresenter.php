<?php

namespace App\Presenters;

use App\Transformers\GeneralInformationTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class GeneralInformationPresenter.
 *
 * @package namespace App\Presenters;
 */
class GeneralInformationPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new GeneralInformationTransformer();
    }
}
