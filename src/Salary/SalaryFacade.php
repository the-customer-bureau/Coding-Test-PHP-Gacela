<?php declare(strict_types=1);

/**
 * Copyright 2022 - The Customer Bureau - All Rights Reserved
 */
namespace Engineered\Salary;

use Gacela\Framework\AbstractFacade;

/**
 * @method ApplicationFactory getFactory()
 */
final class SalaryFacade extends AbstractFacade
{
  public function welcomeMessage(): void
  {
      $this->getFactory()
          ->createSalary()
          ->welcomeMessage();
  }
}
