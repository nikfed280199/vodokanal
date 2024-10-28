<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Reading extends Model
{
    use HasFactory;

    protected $fillable = [
        'meter_id',
        'value',
        'date',
    ];

    protected $casts = [
        'date' => 'datetime'
    ];

    public function meter() {
        return $this->belongsTo(Meter::class);
    }    
}
