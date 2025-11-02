<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Huzas extends Model
{
    use HasFactory;

    protected $table = 'huzas';
    protected $fillable = ['ev', 'het'];
}