<?php

namespace App\Requests;

use App\Http\Infastructure\ApiRequest;
use Illuminate\Http\Request;

class CurrencyListRequest extends ApiRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules(Request $request)
    {

        $request->merge(['from' => $request->route('from')]);
        switch ($this->method()) {
            case 'GET':
            case 'DELETE': {

               
                    $return['from'] = 'required|min:3|max:3';
                    return $return;
                }
            case 'POST': {
                return [];
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
        ];
    }
}
