<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['user_id', 'billing_name', 'billing_address', 'billing_phone', 'billing_subtotal', 'billing_tax', 'billing_total', 'shipped'];
}
