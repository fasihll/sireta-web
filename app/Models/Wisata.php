<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Wisata extends Model
{
    use HasFactory;

    protected $table = 'wisatas';
    protected $fillable = ['image', 'name', 'description', 'category_id'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function alternatifKriteria()
    {
        return $this->hasMany(AlternatifKriteria::class, 'wisata_id', 'id');
    }
}
