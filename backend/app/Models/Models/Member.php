<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\softDeletes;

class Member extends Model
{
    use HasFactory;

    use softDeletes;

    protected $dates = ['deleted_at'];

    protected $guarded = [
        'name',
        'password'
    ];
}
