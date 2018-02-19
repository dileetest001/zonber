<?php

namespace App\Models\Zonber;

use Illuminate\Database\Eloquent\Model;

class CoinInfo extends Model
{
    protected $connection = 'zonber';
    
    protected $fillable = [
        'trade_market',
        'currency',
        'krw',
        'usd',
    ];
}
