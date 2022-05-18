
<?php
/**
 * Copyright 2022 - The Customer Bureau - All Rights Reserved
 */

require __DIR__ . '/vendor/autoload.php';

use Engineered\Application\ApplicationFacade;
use Engineered\Application\CurrencyFacade;

$application = new ApplicationFacade();

$application->welcome_message();
$currency_list = $application->get_currency_list();

foreach ($currency_list as $list)
{
  $conversion_data = ["from"=>$list->from, "to" => $list->to, "amount" => $list->amount];
  $conversion_value = $application->convert_currency($conversion_data);

  echo $list->amount." ".$list->from." "." exchanged into ".$list->to." is equal to: ".$conversion_value."<br><br>";
}


