<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Meter extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'number',
        'address',
    ];

    public function readings() {
        return $this->hasMany(Reading::class);
    }
    
    public function user() {
        return $this->belongsTo(User::class);
    }
}
