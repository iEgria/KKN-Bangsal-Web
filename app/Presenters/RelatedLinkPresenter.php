<?php

namespace App\Presenters;

use App\Transformers\RelatedLinkTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class RelatedLinkPresenter.
 *
 * @package namespace App\Presenters;
 */
class RelatedLinkPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new RelatedLinkTransformer();
    }
}
