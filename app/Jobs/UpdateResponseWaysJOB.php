<?php

namespace App\Jobs;

use App\Models\DataWays;
use App\Models\Way;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Http;

class UpdateResponseWaysJOB implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $ways = Way::all();
        foreach($ways as $way)
        {
            $response =  Http::withOptions([
                'verify' =>false,
            ])->get($way);

            $dataWay =  DataWays::find($way->id);
            $dataWay->update([
                "url" => $way->url,
                "body_response" => $response->body(),
                "status_code" => $response->status(),
            ]);
            
        }
    }
}
