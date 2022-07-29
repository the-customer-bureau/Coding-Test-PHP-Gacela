<?php 

declare(strict_types=1);

namespace Tests\Unit;

use Engineered\Cat\Domain\Cat;
use PHPUnit\Framework\TestCase;

final class CatTest extends TestCase {
    function setUp(): void
    {
        $this->averageCat = new Cat(1, "Albert", 200);
    }

    /** @test can hear the cat speak */
    public function CatCanSpeak() : void
    {
        $this->assertEquals("Hello Cats", $this->averageCat->speak("Hello Cats"));
    }
    /** @test can set the age of our cat */
    public function CatHasAge() : void
    {
        $this->assertEquals(200, $this->averageCat->getAge());
    }
    /** @test can set the age of our cat */
    public function CatSetAge() : void
    {
        $this->averageCat->setAge(20);
        $this->assertEquals(20, $this->averageCat->setAge(20));
    }
    /** @test can see the name of our cat */
    public function CatGetName() {
        $this->assertEquals("Albert", $this->averageCat->getName());
    }
}