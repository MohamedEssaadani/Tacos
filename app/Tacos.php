<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tacos extends Model
{
    protected $fillable = ['tacos_name', 'tacos_price'];

    //When use find(), it automatically assumes the primary key column is going to be id so lets mention our PK
    protected $primaryKey = 'tacos_id';
}
