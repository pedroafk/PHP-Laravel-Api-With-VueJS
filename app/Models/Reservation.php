<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    // Campos que podem ser preenchidos
    protected $fillable = ['name', 'email', 'date', 'time', 'number_of_guests'];
}
