<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Repositories\CurrencyRepositoryInterface;
//

class CurrencyController extends Controller
{

    private $currencyRepository;

    public function __construct(CurrencyRepositoryInterface $CurrencyRepository)
    {
        $this->currencyRepository = $CurrencyRepository; 
    }

    public function currencyConvertor(Request $request)
    {
        return $this->currencyRepository->currencyConvertor($request->from,$request->to,$request->amount);
    }

    public function latestCurrencyList($cur)
    {
        return $this->currencyRepository->latestCurrencyList($cur);
    }

}
