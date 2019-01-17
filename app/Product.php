<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
  protected $primaryKey="product_id";

  protected $fillable = [
      'uid','category','sub_category','product_name','product_price','product_description','product_of_the_day','featured','product_link',
    ];
}
