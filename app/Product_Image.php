<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product_Image extends Model
{
  public $primaryKey="product_image_id";

  protected $fillable = [
   'product_id','product_image','primary_image','uid',
 ];
}
