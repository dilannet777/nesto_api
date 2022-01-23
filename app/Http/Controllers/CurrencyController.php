<?php

namespace App\Http\Controllers;
use App\Requests\CurrencyRequest;
use App\Repositories\CurrencyRepositoryInterface;
use Illuminate\Http\Request;

class CurrencyController extends Controller
{

    private $currencyRepository;

    public function __construct(CurrencyRepositoryInterface $CurrencyRepository)
    {
        $this->currencyRepository = $CurrencyRepository; 
    }

    public function currencyConvertor(CurrencyRequest $request)
    {
        return $this->currencyRepository->currencyConvertor($request->from,$request->to,$request->amount);
    }

    public function latestCurrencyList(Request $request)
    {
        return $this->currencyRepository->latestCurrencyList($request->route('from'));
    }

}
