<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class App extends Model
{
    protected $fillable = [
        'appId',
        'affiliateId',
        'appName',
        'appUrl',
        'currencyName',
        'currencyNameP',
        'currencyValue',
        'rounding',
        'postback',
        'status',
        'affiliate_status',
    ];
}
