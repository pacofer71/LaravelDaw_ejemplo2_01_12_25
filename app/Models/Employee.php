<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Employee extends Model
{
    /** @use HasFactory<\Database\Factories\EmployeeFactory> */
    use HasFactory;
    protected $fillable=['username', 'email', 'activo', 'department_id'];
     //Relaciones 
     //1.- Relacion 1:N con Departamento
     public function department(): BelongsTo{
        return $this->belongsTo(Department::class);
     }
     //2.- Relacion N_M con roles
     public function roles(): BelongsToMany{
        return $this->belongsToMany(Role::class);
     }

     // otros metodos
     public function getArrayIdRoles(): array{
        return $this->roles->pluck('id')->toArray();
     }
}
