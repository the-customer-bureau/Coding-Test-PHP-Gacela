
<?php
/**
 * Copyright 2022 - The Customer Bureau - All Rights Reserved
 */

require __DIR__ . '/vendor/autoload.php';

use Engineered\Application\ApplicationFacade;
use Engineered\Currency\CurrencyFacade;

$application = new ApplicationFacade();
$application->welcomeMessage();

$currency_conversion = new CurrencyFacade();
$currency_conversion->welcomeMessage();
$currency_list = $currency_conversion->getCurrencyList();

foreach ($currency_list as $list)
{
  $conversion_data = ["from"=>$list->from, "to" => $list->to, "amount" => $list->amount, "places" => 2];
  $conversion_value = $currency_conversion->convertCurrency($conversion_data);

  if (str_contains($conversion_value, 'ERROR'))
  {
    echo "<strong>".$conversion_value."</strong>";
  }
  else 
  {
    echo "<p><strong>".$list->amount." ".$list->from." "."</strong> exchanged into <strong>".$list->to."</strong> is equal to: <strong>".$conversion_value." ".$list->to."</strong></p>";
  }
}



