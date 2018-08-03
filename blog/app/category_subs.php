<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;



class category_subs extends Eloquent implements Authenticatable {
    use Notifiable;
    use AuthenticableTrait;
    
    protected $collection = 'category_subs ';
  


}
