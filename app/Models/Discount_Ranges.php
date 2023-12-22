<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discount_Ranges extends Model
{
    protected $table = 'discount_ranges';

    use HasFactory;
    public function discount()
    {
        return $this->belongsTo(Discount::class, 'discount_id');
    }
}
