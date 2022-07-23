<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataWays extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'id',
        'way_id',
        'status_code',
        'body_response',
        'created_at',
        'updated_at'
    ];

    public function way()
    {
        return $this->hasOne(Way::class);
    }
}
