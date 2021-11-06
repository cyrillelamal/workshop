<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sphere extends Model
{
    use HasFactory;

    protected $fillable = [
        'R',
    ];

    protected $casts = [
        'R' => 'float',
    ];

    protected $appends = [
        'V',
    ];

    public function getVAttribute()
    {
        return 4 / 3 * pi() * pow($this->R,  3);
    }
}
