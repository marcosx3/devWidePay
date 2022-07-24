<?php

namespace App\Http\Controllers;

use App\Models\DataWays;
use App\Models\User;
use App\Models\Way;
use Illuminate\Http\Request;

class DataWaysController extends Controller
{
    public function __construct(User $user,Way $way,DataWays $dataways)
    {
        $this->user = $user;
        $this->way = $way;
        $this->dataways = $dataways;
    }

    public function monitoring_all_ways()
    {
        
    }


}
