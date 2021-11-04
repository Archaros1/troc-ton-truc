<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'owner',
        'url',

    ];

    protected $attributes = [];

    public function owner()
    {
        return $this->belongsTo(User::class, 'owner');
    }

    public function description()
    {
        return $this->hasOne(Description::class, 'item_id');
    }

    public function pictures()
    {
        return $this->hasMany(Picture::class, 'item_id');
    }

    public function pic()
    {
        dd($this->pictures());
    }
}
