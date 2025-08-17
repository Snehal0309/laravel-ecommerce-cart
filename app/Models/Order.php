<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model {
    protected $fillable = [
        'user_id','cart_id','subtotal','tax','shipping','total',
        'payment_provider','payment_status','provider_payment_intent'
    ];
    public function payments(){ return $this->hasMany(Payment::class); }
    public function items(){ return $this->hasMany(OrderItem::class); }
    public function user(){ return $this->belongsTo(User::class); }
}
