<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Model\User;
use App\Model\Worker;

class WorkerPay extends Model
{
    use HasFactory;

    protected $fillable = [
        'you_payd',
        'user_id',
        'payd_from_date',
        'payd_till_date',
        'worker_id'
    ];

    public function users()
    {
        return $this->belongsTo(User::class);
    }

    public function worker()
    {
        return $this->belongsTo(Worker::class);
    }
}