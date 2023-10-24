<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramInterest extends Model
{
    use HasFactory;
    protected $table = 'programs_interest';
    protected $fillable = [
        'uuid',
        'name',
        'status',
    ];

    public function interest()
    {
        return $this->belongsTo(ProgramInterest::class, 'uuid', 'uuid');
    }

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
