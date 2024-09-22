<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tickets extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'user_id',
        'title',
        'type',
        'info',
    ];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }
    public function comments() {
        return $this->hasMany(Comments::class,'ticket_id');
    }
}
