<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Question extends Model
{
    protected $fillable = ['title', 'body'];

    public function creator()
    {
        return $this->belongsTo(User::class);
    }

    public function getUrlAttribute()
    {
        return route('questions.show', $this->id);
    }

    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = $value;
        //设置slug
        $this->attributes['slug'] = Str::slug($value);
    }

    public function getCreatedDateAttribute()
    {
        return $this->created_at->diffForHumans();
    }

}
