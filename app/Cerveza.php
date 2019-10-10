<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cerveza extends Model
{
    //
    protected $fillable = [
    'name',
    'description',
    'price',
    'price_on_six',
    'alcohol_grade',
    'inventory'
  ];
}
