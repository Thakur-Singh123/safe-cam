<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';
    protected $fillable = ['stripe_customer_id','order_number','customer_name','customer_email','billing_address','billing_city','billing_state','billing_zip','shipping_address','shipping_city','shipping_state','shipping_zip','total_amount','payment_status'];
}
