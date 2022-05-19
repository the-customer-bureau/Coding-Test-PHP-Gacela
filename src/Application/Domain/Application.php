<?php declare(strict_types=1);

/**
 * Copyright 2022 - The Customer Bureau - All Rights Reserved
 */
namespace Engineered\Application\Domain;
final class Application
{   
    public function welcomeMessage(): void
    {
        echo "<h1>Hello, Welcome to this Application....</h1>";
    }
}
