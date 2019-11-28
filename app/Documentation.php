<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Documentation extends Model
{
    protected $fillable = ['path'];
    public function documentable(){
      return $this->morphTo();
    }
}
