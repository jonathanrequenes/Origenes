<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $fillable = ['category_id', 'name', 'description', 'alcohol_grade', 'inventory',/*'price', 'price_on_six'*/ 'image_path'];

    public function category(){
      return $this->belongsTo(Category::class);
    }

    public function presentations(){
      return $this->belongsToMany(Presentation::class, 'product__presentations', 'product_id', 'presentation_id');
    }
}
