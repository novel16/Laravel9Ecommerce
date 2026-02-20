<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserDetail extends Model
{
    use HasFactory;

    protected $table = 'user_details';

    protected $fillable = [
        'user_id',
        'phone',
        'zip_code',
        'address'
    ];

     public function userDetail()
    {
        return $this->hasOne(UserDetail::class, 'user_id', 'id');
    }
}
