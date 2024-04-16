<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        'invoice_number',
        'owner_name',
        'weight',
        'service',
        'status',
        'id_cashier',
        'id_ironer',
        'id_washer',
        'id_packer',
    ];
}
