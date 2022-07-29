<?php 

declare(strict_types=1);

namespace Engineered\Cat\Domain;

interface CatInterface {
     /**
     * @return string
     */
    public function speak(string $words): string;
    /**
     * @return int of the cats age
     */
    public function getAge(): int;
        /**
     * @return string of the cats name
     */
    public function getName(): string;
    /**
     * Set the cats age
     * @var $age
     */
    public function setAge(int $age): int;
    
}