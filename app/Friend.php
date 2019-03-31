<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Friend extends Model
{
    protected $fillable = [
        "image", "name", "reason", "price", "user_id"
    ];
    public $table = "friends";

}
