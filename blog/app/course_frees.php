<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;



class course_frees extends Eloquent implements Authenticatable {
    use Notifiable;
    use AuthenticableTrait;
    
    protected $collection = 'course_frees';
    protected $dates = [
        'created_at',
        'updated_at',
        'seeme_created_at'
    ];


}
