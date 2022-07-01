<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class voucher extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'voucher_title',
        'start_date',
        'expire_date',
        'amount',
        'image',
        'description',
        'deleted_at'
    ];
}
