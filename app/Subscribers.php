<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subscribers extends Model
{
  protected $fillable = [
      'name','email',
  ];
}