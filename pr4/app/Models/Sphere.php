<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Symfony\Component\Uid\Uuid;

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

    public static function booted()
    {
        static::creating(function(Sphere $sphere) {
            $sphere->id = (string)Uuid::v4();
            $sphere['V'] = $sphere->V;
        });

        static::saving(function(Sphere $sphere) {
            $sphere['V'] = $sphere->V;
        });
    }

    public function getVAttribute()
    {
        return 4 / 3 * pi() * pow($this->R,  3);
    }
}
