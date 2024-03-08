<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'content',
        'status',
        'type_id',
    ];
    //Stabilisco la relazione con i Types  
    public function type() {
        return $this->belongsTo(Type::class);
    }

    //Many-to-Many con Technology
    public function technologies() {
        return $this->belongsToMany(Technology::class);
    }
}
