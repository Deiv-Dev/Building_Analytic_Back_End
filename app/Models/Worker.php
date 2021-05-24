<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Worker extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'you_payd',
        'they_earned'
        'user_id'
    ];

    public function users()
    {
        return $this->belongsTo(User::class);
    }

}