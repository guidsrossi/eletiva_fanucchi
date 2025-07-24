<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Elective extends Model {
    protected $fillable = ['name','seats'];
    public function choices() { return $this->hasMany(ElectiveChoice::class); }

    public function seatsLeft(): int
    {
        return $this->seats - $this->choices()->where('accepted', true)->count();
    }
}
