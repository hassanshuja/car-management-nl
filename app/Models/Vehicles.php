<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicles extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'plate_no',
        'email',
        'brand',
        'type',
        'apk',
        'first_registeration',
        'last_ascription',
        'engine_capacity',
        'fuel',
        'bought_from',
        'address',
        'phone',
        'email',
        'whatsapp',
        'purchase_amount',
        'remainder_amount',
        'remainder_instrument',
        'payment_status',
        'comment',
        'sold_name',
        'sold_amount',
        'sold_payment_status',
        'sold_comment',
        'sold_status',
        'created_at',
        'updated_at'
    ];
}
