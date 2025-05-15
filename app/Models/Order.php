<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';
    protected $fillable = [
        'cart_id','email','phone','fullname','address1','address2','city','state','country',
        'payment_method','cc_name','cc_number','cc_expiration','cc_cvc','terms','total',
    ];
 public $timestamps = true;  
}





