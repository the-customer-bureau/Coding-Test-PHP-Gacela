<html>
    <style>
        body {
            text-align: center;
            border: solid black 5px;
        }
        img {
            display: block;
            margin-left: auto;
            margin-right: auto;
            width: 200px;
            height: 200px;
            
        }
        h3 {
            border: dotted black 5px;
        }
    </style>
<body><h1>The Cattery</h1></body>
</html>

<?php
/**
 * Copyright 2022 - The Customer Bureau - All Rights Reserved
 */

require __DIR__ . '/vendor/autoload.php';

use Engineered\API\APIFacade;
use Engineered\Cat\CatFacade;

$catFacade = new CatFacade();
$catAPIFacade = new APIFacade();

$catNames = [ "Curly", "Silky", "Lucky", "Chester", "Lucy", "Dimond"];
$currentCat = $catFacade->showCat($catNames[rand(0, 5)]);

echo "<h2>$currentCat[0], Aged:$currentCat[1]</h2>";


$catFact = $catAPIFacade->showCatFact();

$catPicture = $catAPIFacade->showCatPicture();
echo "<img src='" . "data:image/jpeg;base64," . base64_encode($catPicture) . "'>";
echo "<h3> Fact of the day: <br /> <p>{$catFact['fact']}</p></h3>";