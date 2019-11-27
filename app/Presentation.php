<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Presentation extends Model
{
    protected $fillable = ['name', 'description', 'price', 'amount'];

    public function products(){
      return $this->belongsToMany(Presentation::class, 'product__presentations', 'presentation_id', 'product_id');
    }
}
