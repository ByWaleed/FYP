<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class paymentType extends Model
{
  public function payments()
   {
     return $this->belongesTo('App\payment');
   }
}
