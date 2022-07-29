<?php
declare(strict_types=1);

namespace Engineered\API;

use Gacela\Framework\AbstractFacade;
/**
 * @method APIFactory getFactory()
 */
final class APIFacade extends AbstractFacade
{
    public function showCatFact() : array
    {
       return $this->getFactory()->connectCatFactEndpoint()->getCatFact();
    }

    public function showCatPicture() : string
    {
        return $this->getFactory()->connectCatPictureEndpoint()->getCatPicture();
    }
}