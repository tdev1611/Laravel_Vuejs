<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User_status extends Model
{
    use HasFactory;
    protected $table = ['users_status'];
    protected $fillable = [
        'name',
    ];

    public function users()
    {
        return $this->hasMany(User::class, 'status_id');
    }
}