<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Str;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'trx_number',
        'total',
        'buyer_name',
        'buyer_wa',
        'buyer_address',
        'status',
        'description',
    ];

    public function transactionProducts()
    {
        return $this->hasMany(TransactionProduct::class);
    }
}
