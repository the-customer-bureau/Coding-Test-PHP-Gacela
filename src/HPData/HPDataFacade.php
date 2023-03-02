<?php
declare(strict_types=1);

namespace Engineered\HPData;

use Gacela\Framework\AbstractFacade;

/**
 * @method HPDataFactory getFactory()
 */

final class HPDataFacade extends AbstractFacade
{
    public function getCharacters(): void
    {
        $this->getFactory()
            ->createHPData()
            ->getCharacters();
    }
}

