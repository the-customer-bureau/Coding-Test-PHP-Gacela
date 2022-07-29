<?php 

declare(strict_types=1);
namespace Engineered\Cat\Domain;

use Engineered\Cat\Domain\CatInterface;

class Cat implements CatInterface {
    function __construct($id, string $name, int $age) {
        $this->id = $id;
        $this->name = $name;
        $this->age = $age;
    }

    public function speak(string $words): string {
        return $words;
    }

    public function getAge(): int {
        return $this->age;  
    }

    public function getName(): string {
        return $this->name;
    }
    
    public function setAge(int $age): int {
        return $this->age = $age;
    }
}