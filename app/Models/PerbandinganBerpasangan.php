<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PerbandinganBerpasangan extends Model
{
    use HasFactory;
    protected $table = 'perbandingan_berpasangans';
    protected $fillable = [
        'title',
        'matrix',
        'matrix_row_sum',
        'matrix_normalized',
        'matrix_normalized_col_sum',
        'wights',
        'eigens',
        'lambda_max',
        'consistency_index',
        'random_index',
        'consistency_ratio',
        'is_consistent',
        'consistecy'
    ];
}
