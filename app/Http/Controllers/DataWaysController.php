<?php

namespace App\Http\Controllers;

use App\Models\DataWays;
use App\Models\Way;
use Illuminate\Support\Facades\Http;

class DataWaysController extends Controller
{
    public function  __construct()
    {
    }

    public function monitoring_created_way(String $way,$way_id)
    {
        $response =  Http::withOptions([
            'verify' =>false,
        ])->get($way);
       
       $dataWay = new DataWays();
       $dataWay->way_id = $way_id;
       $dataWay->body_response = $response->body();
       $dataWay->status_code = $response->status();
       $dataWay->save();
    }

    public function monitoring_update_way(String $way,$way_id)
    {
     
    }
}
