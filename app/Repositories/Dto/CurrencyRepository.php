<?php

namespace App\Repositories\Dto;



use App\Repositories\CurrencyRepositoryInterface;
use App\Models\Currency;
use Carbon\Carbon;
use DB;


class CurrencyRepository implements CurrencyRepositoryInterface
{


    public function currencyConvertor($from,$to, $amount=0)
    {
            $currencyObj= Currency::getRows();


            if (!empty($currencyObj['success'])){

                if (empty($currencyObj['rates'][$from]))
                    return ["success"=> false,'error'=>__('validation.ex_no_currency_error',['currency'=>$from])];
                    
                if (empty($currencyObj['rates'][$to]))
                    return ["success"=> false,'error'=>__('validation.ex_no_currency_error',['currency'=>$to])];
               
                $fromRate=1/$currencyObj['rates'][$from];
                $toRate=$currencyObj['rates'][$to];

                return ['success'=>true,'date'=>$currencyObj['date'],'timestamp'=>$currencyObj['timestamp'],'result'=>$fromRate*$toRate*$amount];

            }else{

                return ["success"=> false,'error'=>$currencyObj['error']];
            }
    }

    public function latestCurrencyList($from)
    {
        $currenciesObj= Currency::getRows();
        $newCurrencies=[];
        if (!empty($currenciesObj['success'])){
            $from=strtoupper($from);
            if (empty($currenciesObj['rates'][$from]))
                return ["success"=> false,'error'=>__('validation.ex_no_currency_error',['currency'=>$from])];
                
            $fromRate=1/$currenciesObj['rates'][$from];
            foreach ($currenciesObj['rates'] as $key=>$rate){
                if (empty($rate)) continue;
                $newCurrencies[$key]=number_format($fromRate*$rate,6);
            }

            return ['success'=>true,'date'=>$currenciesObj['date'],'timestamp'=>$currenciesObj['timestamp'],$from=>$newCurrencies];

        }else{

            return ["success"=> false,'error'=>$currenciesObj['error']];
        }

    }

}