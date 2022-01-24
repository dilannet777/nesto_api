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
        $response=$this->currencyRepository->currencyConvertor($request->from,$request->to,$request->amount);
        return  response($response,$response['success']?200:422);

    }

    public function latestCurrencyList(Request $request)
    {
        $response=$this->currencyRepository->latestCurrencyList($request->route('from'));
        return  response($response,$response['success']?200:422);
    }

}
