<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Apartment extends Model
{
    use HasFactory;
    use SoftDeletes;


    protected $with = ['services'];

    protected $fillable = ['title', 'baths', 'rooms', 'square_meters', 'beds', 'cover_image', 'address', 'latitude', 'longitude', 'description', 'expiration'];

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

    public function sponsorships()
    {
        return $this->belongsToMany(Sponsorship::class);
    }

    public function messages()
    {
        return $this->hasMany(Message::class);
    }

    public function getMessageCountAttribute()
    {
        return $this->messages()->count();
    }

    public function getMessageToRead()
    {
        return $this->messages()->whereIsRead(false)->count();
    }

    public function getSponsorshipExpirationsDate()
    {
        return $this->sponsorships()->pluck('expiration')->map(function ($date) {
            return Carbon::parse($date)->format('H:i d/m/Y');
        })->implode(', ');
    }

    public function views()
    {
        return $this->hasMany(View::class);
    }

    public function printImage()
    {
        return asset('storage/' . $this->cover_image);
    }

    public function image(): Attribute
    {
        return Attribute::make(fn ($value) => url('storage/' . $value));
    }
}
