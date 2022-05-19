<?php declare(strict_types=1);

namespace Engineered\Currency\Domain;

final class Currency
{   
    public function welcomeMessage(): void
    {
        echo "<h1>Niall & Ray!</h1>";
        echo "<h3>Below you can see the Currency Converter.</h3>";
    }

    public function currencyList(): array
    { 
       $currencies = array();
       $currencies[1] = (object) array("amount"=> 198, "from"=>"GBP", "to"=>"EUR");
       $currencies[2] = (object) array("amount"=> 96, "from"=>"EUR", "to"=>"GBP");
       $currencies[3] = (object) array("amount"=> 180, "from"=>"GBP", "to"=>"USD");
       $currencies[4] = (object) array("amount"=> 900, "from"=>"USD", "to"=>"EUR");
       $currencies[5] = (object) array("amount"=> 9000, "from"=>"JPY", "to"=>"EUR");
       $currencies[6] = (object) array("amount"=> 100, "from"=>"JPY", "to"=>"GBP");
       
       return $currencies;
    }

    public function covertCurrency($conversion_url, $conversion_data): float 
    {
      $ch = curl_init($conversion_url.http_build_query($conversion_data));
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      $response = curl_exec($ch);
      $response = json_decode($response);
      curl_close($ch);

      $converted_value = $response->result;

      return $converted_value;
    }
}
