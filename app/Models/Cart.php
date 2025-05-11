<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model {
  protected $fillable = []; // no fillable fields, as you only auto-create
  public function items() {
    return $this->hasMany(CartItem::class);
  }
}
