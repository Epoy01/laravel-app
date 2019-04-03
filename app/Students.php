<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Students extends Model
{
	protected $primaryKey="s_id";
    protected $fillable=[
    	'fname',
    	'mname',
    	'lname',
    	'course',
    	'yr',
    	'address'
    ];
}
