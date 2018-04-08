<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Links extends Model
{
    public function users()
    {
    	return $this->belongsTo('App\Users');
    }
}
