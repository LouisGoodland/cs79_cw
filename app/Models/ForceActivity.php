<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ForceActivity extends Model
{
    use HasFactory;
    protected $fillable = [
        'time',
        'lower_threashold',
        'upper_threashold',
    ];

    public function session(){
        return $this->belongsTo(Session::class);
    }
}
