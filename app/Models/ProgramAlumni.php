<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramAlumni extends Model
{
    use HasFactory;

    protected $table = 'programs_alumni';
    protected $fillable = [
        'uuid',
        'image',
        'name',
        'school',
        'work',
        'profession',
        'quote',
        'year',
        'status',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'id',
        'created_at',
        'updated_at',
    ];
}
