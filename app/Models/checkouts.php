<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class checkouts extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'user_id',
        'camp_id',
        'card_id',
        'expired',
        'cvc',
        'is_paid'
    ];
}
