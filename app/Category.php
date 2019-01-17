<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
  public $primaryKey="cat_id";

  protected $fillable = [
   'cat_id','cat_name',
 ];
}
