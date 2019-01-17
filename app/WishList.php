<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WishList extends Model
{
    //
    protected $primaryKey="wish_id";
   protected $fillable = [
       'uid', 'list_name','product_id',
   ];
}
