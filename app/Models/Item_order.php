<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item_order extends Model
{
    use HasFactory;
    protected $fillable = [
        'transaction_id', 'product_name', 'count', 'price', 'discount', 'sum_price'
    ];

    public function transaction(){
        return $this->belongsTo(Transaction::class);
    }
}
