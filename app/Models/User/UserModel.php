<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserModel extends Model
{
    //usermodel
    public $table ="users";
    public $primaryKey = 'user_id';
    public $fillable = 
    [
        'user_name', 'user_phoneNumber','user_email','user_password','user_address','user_status','user_createAt'
    ];
    public $timestamps = false;
}
