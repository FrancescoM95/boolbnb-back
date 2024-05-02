<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'surname', 'email', 'text', 'apartment_id'];

    public function apartment()
    {
        return $this->belongsTo(Apartment::class);
    }
}
