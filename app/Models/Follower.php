<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Follower extends Model
{
    use HasFactory;

    protected $fillable = [
        'followUser_id',
        'followerUser_id',
    ];

    public function followUser() {
        return $this->belongsTo(User::class);
    }

    public function followerUser() {
        return $this->belongsTo(User::class);
    }

}
