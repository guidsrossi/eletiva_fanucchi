<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model {
    protected $fillable = ['full_name','life_project','class_id'];
    public function class()  { return $this->belongsTo(ClassModel::class, 'class_id'); }
    public function choices(){ return $this->hasMany(ElectiveChoice::class); }
}
