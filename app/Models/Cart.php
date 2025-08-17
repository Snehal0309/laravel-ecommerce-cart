<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model {
    protected $fillable = ['user_id','status','subtotal','tax','shipping','total'];

    public function items(){ return $this->hasMany(CartItem::class); }
    public function user(){ return $this->belongsTo(User::class); }

   public function recalc(): void
    {
        $subtotal = $this->items()->sum('line_total');
        $tax = round($subtotal * 0.18, 2);       // example 18% GST
        $shipping = $subtotal > 999 ? 0 : 49;    // free shipping rule
        $total = $subtotal + $tax + $shipping;
        $this->update(compact('subtotal','tax','shipping','total'));
    }

      public static function forUser(int $userId): self
    {
        return static::firstOrCreate(['user_id'=>$userId,'status'=>'active']);
    }

      public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
