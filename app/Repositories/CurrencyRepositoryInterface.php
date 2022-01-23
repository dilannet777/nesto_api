<?php
namespace App\Repositories;

interface CurrencyRepositoryInterface
{
   public function currencyConvertor(string $from,string $to, float $amount) ;
   public function latestCurrencyList(string $form);

}