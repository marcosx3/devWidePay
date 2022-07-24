<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Way extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'id',
        'user_id',
        'url',
        'active',
        'created_at',
        'updated_at'
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id','id');
    }
    public function dataWays()
    {
        return $this->hasOne(DataWays::class);
    }
}
