<?php

namespace App\Models;
use Carbon\Carbon;

use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model
{
    public function getCreatedAtAttribute($value)
    {
    	$utc = \Carbon\carbon::createFromFormat($this->getDateFormat(),$value);
    	return $utc->setTimezone('America/Chicago')->diffForHumans();
    }

    public function getUpdatedAtAttribute($value)
    {
    	$utc = \Carbon\carbon::createFromFormat($this->getDateFormat(),$value);
    	return $utc->setTimeZone('America/Chicago')->diffForHumans();
    }
}
