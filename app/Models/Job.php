<?php

namespace App\Models;
use App\Models\Client;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Job extends Model
{
    use HasFactory;

    protected $fillable = [
        'address',
        'description',
        'start',
        'finish',
        'user_id'
    ];

    public function clients()
    {
        return $this->belongsTo(Client::class);
    }

    public function users()
    {
        return $this->belongsTo(User::class);
    }
}