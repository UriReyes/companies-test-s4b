<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{
    use HasFactory;
    use SoftDeletes; //Implementamos

    protected $dates = ['deleted_at']; //Registramos la nueva columna
    protected $fillable = ['first_name', 'last_name', 'company_id', 'email', 'phone', 'gender'];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

}
