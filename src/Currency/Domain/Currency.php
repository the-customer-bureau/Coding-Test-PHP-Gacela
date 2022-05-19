<?php declare(strict_types=1);

namespace Engineered\Currency\Domain;

use Exception;
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

    public function covertCurrency($conversion_url, $conversion_data): string 
    {
      try {
          $ch = curl_init($conversion_url.http_build_query($conversion_data));
          curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
          $response = curl_exec($ch);

          if ($response !== false) 
          {
            $response = json_decode($response);
            curl_close($ch);
            return (string) $response->result;
          }
          else 
          {
            throw new Exception("ERROR: There has been an issue with this conversion. Please try again.");
          }
      }
      catch (Exception $e) {
          return $e->getMessage();
      }
    }
}
