<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{

    protected $table = 'profiles';

    protected $fillable = ['user_id'];
    
    function user() {
    	return $this->belongsTo('App\User');
   }

   function applicant() {
    	return $this->belongsTo('App\Applicant', 'applicants');
   }
}
