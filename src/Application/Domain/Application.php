<?php declare(strict_types=1);

/**
 * Copyright 2022 - The Customer Bureau - All Rights Reserved
 */
namespace Engineered\Application\Domain;
final class Application
{
    private string $conversion_url;
    
    public function __construct()
    {
      $this->conversion_url = "https://api.exchangerate.host/convert?";
    }

    public function welcome_message(): void
    {
        echo "<h1>Hello Application</h1>";
        echo "<h3>Welcome to the currency exchange!</h3>";
    }

    public function currency_list(): array
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

    public function covert_currency($conversion_data): float 
    {
      $ch = curl_init($this->conversion_url.http_build_query($conversion_data));
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      $response = curl_exec($ch);
      $response = json_decode($response);
      curl_close($ch);

      $converted_value = round($response->result,2);

      return $converted_value;
    }
}
