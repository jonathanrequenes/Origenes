<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $fillable = ['category_id', 'name', 'description', 'price', 'price_on_six', 'alcohol_grade', 'inventory', 'image_path'];

    public function category(){
      return $this->belongsTo(Category::class);
    }
}
