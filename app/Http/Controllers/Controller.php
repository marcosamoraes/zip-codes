<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Str;
use App\Models\State;
use App\Models\City;
use App\Models\ZipCode;
use App\Models\Settlement;

class Controller extends BaseController
{
    /**
     * Search a zip code in database and return all the data about it.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  numeric $zip_code
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $zip_code) {

        if (!is_numeric($zip_code))
            return (new Response(['error' => 'Zip Code has to be numeric'], 400));

        $zip_code = sprintf("%05d", $zip_code);

        $zip_code = ZipCode::where('zip_code', $zip_code)->first();

        $settlements = Settlement::where('zip_code_id', $zip_code->id)->get();

        $settlementsArr = [];
        foreach ($settlements as $settlement) {
            $settlementsArr[] = [
                "key" => $settlement->id,
                "name" => strtoupper(Str::ascii($settlement->name)),
                "zone_type" => strtoupper(Str::ascii($settlement->zone)),
                "settlement_type" => [
                    "name" => Str::ascii($settlement->type)
                ]
            ];
        }

        $response = [
            "zip_code" => $zip_code->zip_code,
            "locality" => strtoupper(Str::ascii($zip_code->city->name)),
            "federal_entity" => [
                "key" => $zip_code->city->state->id,
                "name" => strtoupper(Str::ascii($zip_code->city->state->name)),
                "code" => null
            ],
            "settlements" => $settlementsArr,
            "municipality" => [
                "key" => $zip_code->city->id,
                "name" => strtoupper(Str::ascii($zip_code->city->name))
            ]
        ];

        return (new Response($response, 200));
    }
}
