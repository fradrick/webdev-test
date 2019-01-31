<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    protected $table = 'persons';
    protected  $fillable = ['first_name', 'surname', 'date_of_birth'];
    protected $dates = ['created_at', 'updated_at', 'date_of_birth'];

    public function personal_attributes(){
        return $this->hasMany('App\Models\PersonAttribute');
    }

    public function getFullNameAttribute(){
        return $this->first_name." ".$this->surname;
    }
}
