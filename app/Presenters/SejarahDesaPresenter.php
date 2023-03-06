<?php

namespace App\Presenters;

use App\Transformers\SejarahDesaTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class SejarahDesaPresenter.
 *
 * @package namespace App\Presenters;
 */
class SejarahDesaPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new SejarahDesaTransformer();
    }
}
