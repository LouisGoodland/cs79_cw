<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    use HasFactory;
    protected $fillable = [
        'task_type',
        'session_status',
        'session_date',
        'session_time',
        'message'
    ];

    public function account(){
        return $this->belongsTo(Account::class);
    }

    public function movements()
    {
        return $this->hasMany(Movement::class);
    }

    public function forceActivity()
    {
        return $this->hasOne(forceActivity::class);
    }
}
