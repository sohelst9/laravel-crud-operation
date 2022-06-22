<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentInfo extends Model
{
   protected $fillable = [
        'name',
        'roll',
        'clg_name',
        'father_name',
        'mother_name',
        'phn_number',
        'status',
        'image',
   ];
}
