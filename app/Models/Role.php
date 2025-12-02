<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Role extends Model
{
    protected $fillable=['nombre', 'color'];

    //Relacion N_M con employees
    public function employees(): BelongsToMany{
        return $this->belongsToMany(Employee::class);
    }
}
