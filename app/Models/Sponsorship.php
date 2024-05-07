<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sponsorship extends Model
{
    use HasFactory;

    protected $fillable = [
        // Altri attributi...
        'expiration'
    ];

    public function apartments()
    {
        return $this->belongsToMany(Apartment::class)->withPivot('expiration');
    }
}
