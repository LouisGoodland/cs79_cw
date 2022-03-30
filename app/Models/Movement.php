<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movement extends Model
{
    use HasFactory;
    protected $fillable = [
        'movement_type',
        'order'
    ];
    public function session(){
        return $this->belongsTo(Session::class);
    }
}
