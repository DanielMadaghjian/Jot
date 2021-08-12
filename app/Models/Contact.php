<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Contact extends Model
{
    protected $guarded = [];

    protected $dates = ['birthday'];

    public function path() //job is to know how to access its own resource
    {
        return '/contacts/'. $this->id;
    }

    public function scopeBirthdays($query)
    {

        return $query->whereRaw('birthday like "%-' . now()->format('m') . '-%"');
    }

    public function setBirthdayAttribute($birthday)
    {
        $this->attributes['birthday'] = Carbon::parse($birthday);
    }

    public function user()
    {
        return $this->belongsTo(User::class); //this contact belongs to a user
    }
}
