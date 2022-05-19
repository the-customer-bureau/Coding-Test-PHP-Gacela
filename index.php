
<?php
/**
 * Copyright 2022 - The Customer Bureau - All Rights Reserved
 */

require __DIR__ . '/vendor/autoload.php';

use Engineered\Application\ApplicationFacade;
use Engineered\Salary\SalaryFacade;

$application = new ApplicationFacade();

$application->welcomeMessage();
$currency_list = $application->getCurrencyList();

foreach ($currency_list as $list)
{
  $conversion_data = ["from"=>$list->from, "to" => $list->to, "amount" => $list->amount, "places" => 2];
  $conversion_value = $application->convertCurrency($conversion_data);

  echo $list->amount." ".$list->from." "." exchanged into ".$list->to." is equal to: ".$conversion_value."<br><br>";
}

$salary = new SalaryFacade();
$salary->welcomeMessage();


