<?php

namespace App\Models;


use App\Models\ProgramAlumni;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    use HasFactory;
    
    protected $table = 'programs';
    protected $fillable = [
        'uuid',
        'title',
        'campus',
        'level',
        'image',
        'status',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    public function alumni(){
        return $this->hasMany(ProgramAlumni::class,'uuid');
    }
    protected $hidden = [
        'id',
        'created_at',
        'updated_at',
    ];
}
