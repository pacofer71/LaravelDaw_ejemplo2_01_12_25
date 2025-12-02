<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Department extends Model
{
    protected $fillable=['nombre', 'color'];
    //Ponemos las relaciones si las hay
    public function employees(): HasMany{
        return $this->hasMany(Employee::class);
    }
}
