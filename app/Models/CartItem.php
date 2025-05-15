<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class CartItem extends Model {
 protected $table = 'cart_items';

    // allow mass-assignment on these fields
    protected $fillable = [
      'cart_id',
      'product_name',
      'quantity',
      'price',
    ];
  public function cart() {
    return $this->belongsTo(Cart::class);
  }
}