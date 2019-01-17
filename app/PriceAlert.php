<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PriceAlert extends Model
{
    //
    protected $primaryKey="alert_id";
   protected $fillable = [
       'uid', 'price','product_id',
   ];
}
