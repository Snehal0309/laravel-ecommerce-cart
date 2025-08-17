<?php
// app/Models/Payment.php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = ['order_id','provider','provider_payment_id','status','amount','payload'];
    protected $casts = ['payload'=>'array'];
    public function order(){ return $this->belongsTo(Order::class); }
}

?>