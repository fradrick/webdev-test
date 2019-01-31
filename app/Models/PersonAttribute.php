<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PersonAttribute extends Model
{
    protected $fillable = ['person_id', 'attribute_name', 'attribute_value'];

    public function person(){
        return $this->belongsTo('App\Models\Person');
    }
}
