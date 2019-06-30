<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
  public function reservation()
    {
      return $this->belongesTo('App\Reservation');
    }
}
