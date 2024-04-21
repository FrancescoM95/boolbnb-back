<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Apartment extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['title', 'baths', 'rooms', 'square_meters', 'beds', 'address', 'latitude', 'longitude'];

    public function getCreatedAt()
    {
        return Carbon::create($this->created_at)->format('d-m-Y');
    }
    public function getUpdatedAt()
    {
        return Carbon::create($this->updated_at)->format('d-m-Y H:i:s');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function services()
    {
        return $this->belongsToMany(Service::class);
    }

    public function messages()
    {
        return $this->hasMany(Message::class);
    }

    public function views()
    {
        return $this->hasMany(View::class);
    }

    public function printImage()
    {
        return asset('storage/' . $this->cover_image);
    }
}
