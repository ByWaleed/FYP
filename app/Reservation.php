<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
  public function rooms()
   {
     return $this->hasMany('App\Room');
   }

   public function customers()
    {
      return $this->hasMany('App\Customer');
    }
    public function users()
     {
       return $this->hasMany('App\User');
     }
     public function payment()
       {
         return $this->belongesTo('App\payment');
       }
}
