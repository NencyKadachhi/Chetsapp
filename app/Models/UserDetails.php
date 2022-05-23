<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class UserDetails extends Model
{
    use HasFactory,SoftDeletes;

    
    protected $table = 'user_details';
    protected $primarykey = 'id';
    protected $fillable  = ['id','user_id','user_image	','address','city','country','deleted_at','created_at','updated_at'];
}
