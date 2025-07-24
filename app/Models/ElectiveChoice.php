<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ElectiveChoice extends Model {
    protected $fillable = ['student_id','elective_id','priority','accepted'];
    public function student()  { return $this->belongsTo(Student::class); }
    public function elective() { return $this->belongsTo(Elective::class); }
}
