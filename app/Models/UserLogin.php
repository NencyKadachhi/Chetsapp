<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserLogin extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = 'user_logins';
    protected $primarykey = 'id';
    protected $fillable  = ['id','username','email','password','deleted_at','created_at','updated_at'];

    public function UserDetail()
    {
        return $this->hasOne(UserDetails::class,'user_id','id');
    }

}
