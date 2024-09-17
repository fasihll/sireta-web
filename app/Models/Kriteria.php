<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kriteria extends Model
{
    use HasFactory;
    protected $table = 'kriterias';
    protected $fillable = ['name', 'bobot', 'type'];

    const TYPE_BENEFIT = 'benefit';
    const TYPE_COST = 'cost';
}
