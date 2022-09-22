<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;
    protected $fillable = [
        'uid2',
        'pwd2',
        'name2',
        'tel2',
        'rank2'
    ]; 
}
