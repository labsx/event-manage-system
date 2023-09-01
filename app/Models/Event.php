<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $guarded = [];

    // public function scopeFilter($query, array $filters){
    //     if($filters['search'] ?? false){
    //         $query->where('name', 'like','%'. request('search'). '%')
    //             ->orWhere('venue', 'like','%'. request('search'). '%')
    //             ->orWhere('description', 'like','%'. request('search'). '%');
    //     }

    // }

    public function user_id()
    {
        return $this->hasMany(Event::class);
    }
}
