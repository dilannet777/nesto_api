<?php

namespace App\Requests;

use App\Http\Infastructure\ApiRequest;
use Illuminate\Http\Request;

class CurrencyRequest extends ApiRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules(Request $request)
    {

        switch ($this->method()) {
            case 'GET':
            case 'DELETE': {
                    return [];
                }
            case 'POST': {
                    $return['to'] = 'required|min:3|max:3';
                    $return['from'] = 'required|min:3|max:3';
                    $return['amount'] = 'required|numeric|min:0|not_in:0';
                    return $return;
                }
            case 'PUT':
            case 'PATCH': {
                    return [];
                }
            default:
                break;
        }
    }

    public function attributes()
    {
        return [
            'from' => 'Source currency',
            'to' => 'Target currency',
            'amount' => 'Monetary value'
        ];
    }
}
