<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RegModel extends Model
{
        protected $fillable = ['first_name','last_name','email','gender','date_of_birth','phone','file'];

}
