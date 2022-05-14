<?php

/**
 * Copyright 2022 - The Customer Bureau - All Rights Reserved
 */

namespace Engineered\Application;

use Gacela\Framework\AbstractFacade;

/**
 * @method ApplicationFactory getFactory()
 */

final class ApplicationFacade extends AbstractFacade
{
	public function boot()
	{
		return $this->getFactory()->createApplication()->boot();
	}
}
