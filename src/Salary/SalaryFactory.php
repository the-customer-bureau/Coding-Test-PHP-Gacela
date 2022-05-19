<?php
declare(strict_types = 1);

/**
 * Copyright 2022 - The Customer Bureau - All Rights Reserved
 */

namespace Engineered\Salary;

use Gacela\Framework\AbstractFactory;
use Engineered\Salary\Domain\Salary;
use Engineered\Salary\SalaryConfig;

/**
 * @method SalaryFactory getConfig()
 */
final class SalaryFactory extends AbstractFactory
{
  public function createSalary(): Salary
  {
      return new Salary();
  }

}
