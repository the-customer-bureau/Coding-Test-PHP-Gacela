<?php declare(strict_types=1);

/**
 * Copyright 2022 - The Customer Bureau - All Rights Reserved
 */
namespace Engineered\Salary\Domain;

final class Salary
{   
    public function welcomeMessage(): void
    {
        echo "<h1>Hello Niall & Ray</h1>";
        echo "<h3>Welcome to the Salary Calculation exchange!</h3>";
    }
}
