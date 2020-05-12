<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tacos extends Model
{
    protected $fillable = ['tacos_name', 'tacos_price'];

    protected $primaryKey = 'tacos_id';
}
