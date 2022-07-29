<?php

namespace App\Http\Controllers;

use App\Models\DataWays;
use App\Models\Way;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class DataWaysController extends Controller
{
    public function  __construct()
    {
    }

    public function monitoring_created_way(String $way, $way_id)
    {
        $response =  Http::withOptions([
            'verify' => false,
        ])->get($way);

        $dataWay = new DataWays();
        $dataWay->way_id = $way_id;
        $dataWay->body_response = $response->body();
        $dataWay->status_code = $response->status();
        DB::insert(
            'insert into data_ways (way_id,status_code,body_response,created_at,updated_at) values (?,?,?,?,?)',
            array($dataWay->way_id, $dataWay->status_code,  $dataWay->body_response, \Carbon\Carbon::now(), \Carbon\Carbon::now())
        );
    }

    public function monitoring_update_way(String $way, $way_id)
    {
    }
}
