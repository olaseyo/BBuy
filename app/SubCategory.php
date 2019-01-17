<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
  public $primaryKey="sub_cat_id";

  protected $fillable = [
   'cat_id','sub_cat_name',
 ];
}
