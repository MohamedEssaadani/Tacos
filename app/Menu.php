<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $fillable = ['menu_name', 'tacos_id', 'drink_id', 'menu_price', 'image', 'with_frite'];
    protected $primaryKey = 'menu_id';
}
