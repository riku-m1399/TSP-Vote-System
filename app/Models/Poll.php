<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Result;

class Poll extends Model
{
    use HasFactory;

    public function result(){
        return $this->hasMany(Result::class);
    }
}
