<?php 

declare(strict_types=1);

namespace Engineered\Cat;


use Engineered\Cat\Domain\Cat;
use Gacela\Framework\AbstractFactory;

final class CatFactory extends AbstractFactory
{
   public function birthCat($name)
   {
      $newCat = new Cat(random_bytes(4), $name, rand(6, 15));
      return array($newCat->getName(),
                   $newCat->getAge());
   }
}