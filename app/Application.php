<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
/*
 	This model interacts with the 'Applications' Table
 */
class Application extends Model
{
	// This is necessary so we can POST new Applications 
    protected $guarded = [];
}
