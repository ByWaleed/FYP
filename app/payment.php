<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class payment extends Model
{
  public function reservations()
   {
     return $this->hasMany('App\Reservation');
   }
   public function paymentTypes()
    {
      return $this->hasMany('App\paymentType');
    }
}
