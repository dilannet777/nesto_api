<?php
namespace App\Models;
use Sushi\Sushi;
use Illuminate\Support\Facades\Http;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Currency  extends Model
{
   use Sushi;
 
    public function getRows()
    {
     return Cache::remember('Product::rows', 3600, function () {
     return array_map(function ($a) {
            return $a;
        },
            self::getAPI()
        );
      });
    }
   protected  static function getAPI()
   {
        $headers = [];
        $response = Http::withHeaders($headers)
            ->get(config('app.exchange_api_url').'?access_key='.config('app.exchange_api_key'));
        return $response->json();
   }
}