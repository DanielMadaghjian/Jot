<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Post extends Model
{
    protected $guarded = [];

    protected $dates = ['date'];
    protected $table = 'posts';

    public function path() //job is to know how to access its own resource
    {
        return '/posts/'. $this->id;
    }

   

    public function setBirthdayAttribute($date)
    {
        $this->attributes['date'] = Carbon::parse($date);
    }

    public function user()
    {
        return $this->belongsTo(User::class); //this contact belongs to a user
    }
}
