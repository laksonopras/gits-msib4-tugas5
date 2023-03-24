<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    
    protected $primaryKey = 'transaction_id';
    public $incrementing = false;

    protected $fillable = [
        'transaction_id', 'item_total',  'pajak','sum_price', 'pay', 'change'
    ];

    public function item_order(){
        return $this->hasMany(Item_order::class);
    }
}
