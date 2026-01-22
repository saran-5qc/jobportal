<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class resumeModels extends Model
{
          protected $fillable=['jobtableModel_id','user_id','registration_models_id','applied_date',
        'name','phone','email','Summary','qualification','skills','projects','Fathers_name','Passport','date_of_birth','language_known','hobbies','address'
        ,'image'];

        
        public function JobTable(){
        return $this->belongsTo(jobtableModel::class, 'jobtable_models_id', );
    }
    public function User(){
        return $this->belongsTo(RegModel::class);
    }

}
