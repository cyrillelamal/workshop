<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sphere extends Model
{
    use HasFactory;

    protected $table = 'calculations';

    public $timestamps = false;

    public $incrementing = false;

    protected $keyType = 'string';

    protected $fillable = [
        'R',
    ];

    protected $casts = [
        'R' => 'float',
    ];

    public function getVAttribute()
    {
        return 4 / 3 * pi() * pow($this->R,  3);
    }
}
