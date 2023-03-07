<?php

namespace App\Presenters;

use App\Transformers\StukturOrganisasiTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class StukturOrganisasiPresenter.
 *
 * @package namespace App\Presenters;
 */
class StukturOrganisasiPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new StukturOrganisasiTransformer();
    }
}
