<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable=['title','subtitle','content','main_image','slug','user_id'];
    public function getUser()
    {
        return $this->hasOne(User::class,'id','user_id');
    }
}
