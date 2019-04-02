<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contacts extends Model
{
    protected $primaryKey = "cont_id";
    protected $fillable = [
    	'fname',
    	'mname',
    	'lname',
    	'age',
    	'gen',
    	'contact'
    ];
}
