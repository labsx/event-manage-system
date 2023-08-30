<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function scopeFilter($query, array $filters){
        if($filters['search'] ?? false){
            $query->where('name', 'like','%'. request('search'). '%')
                ->orWhere('event', 'like','%'. request('search'). '%')
                ->orWhere('email', 'like','%'. request('search'). '%');
        }

    }
}
