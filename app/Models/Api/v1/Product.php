<?php

namespace App\Models\Api\v1;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        "name",
        "price",
        "user_creator",
        "user_last_update"
    ];

    public function userCreator(){
		return $this->belongsTo(User::class, 'user_creator','id');
	}

    public function user_last_update(){
		return $this->belongsTo(User::class, 'user_last_update','id');
	}

}
