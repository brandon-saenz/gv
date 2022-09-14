<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleados extends Model
{
    use HasFactory;
    protected $fillable = [
        "name",
        "second_name",
        "last_name_1",
        "last_name_2",
        "job_name",
        "dept_name",
        "email",
        "phone",
        "status",
        "type_register"
    ];
}
