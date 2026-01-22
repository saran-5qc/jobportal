<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class jobtableModel extends Model
{
      protected $fillable = [
        'title', 'category_id', 'job_type_id', 'user_id', 'vacancy', 'Salary',
        'location', 'description', 'benefits', 'Responsibility', 'Qualification',
        'Keywords', 'experience', 'company_name', 'company_location', 'company_website'
    ];
       public function JobType(){
        return $this->belongsTo(JobTypesModel::class);
    }
    
    public function Category(){
        return $this->belongsTo(category_models::class);
    }
}
