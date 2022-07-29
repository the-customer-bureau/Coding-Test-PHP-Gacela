<?php
declare(strict_types=1);

namespace Engineered\Cat;

use Gacela\Framework\AbstractFacade;
/**
 * @method CatFactory getFactory()
 */
final class CatFacade extends AbstractFacade
{
    public function showCat($name)
    {
       return $this->getFactory()->birthCat($name);
    }
}