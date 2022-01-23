<?php

namespace App\Http\Infastructure;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpKernel\Exception\UnprocessableEntityHttpException;
use Response;
abstract class ApiRequest extends FormRequest
{
    protected function failedValidation(Validator $validator)
    {
      throw new UnprocessableEntityHttpException($validator->errors());

       
    }

    protected function failedAuthorization()
    {
        throw new HttpException(403);
    }
}