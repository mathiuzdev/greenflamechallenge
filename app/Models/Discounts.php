<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
class Discounts extends Model
{

    use HasFactory;
    protected $fillable = [
        'name',
        'start_date',
        'end_date',
        'priority',
        'active',
        'region_id',
        'brand_id',
        'access_type_code',
    ];


    public function region()
    {
        return $this->belongsTo(Region::class, 'region_id','code');
    }

    public function brand()
    {
        return $this->belongsTo(Brands::class, 'brand_id');
    }

    public function accessType()
    {
        return $this->belongsTo(Access_Types::class, 'access_type_code', 'code');
    }

   /*  public function discountRanges()
    {
        return $this->hasMany(Discount_Ranges::class, 'discount_id')->withTrashed();
    } */
    public function discountRanges(): HasMany
    {
        return $this->hasMany(Discount_Ranges::class,'discount_id')->withoutGlobalScopes();
    }
    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($discount) {
            $discount->discountRanges()->each(function ($range) {
                $range->delete();
            });
        });
    }
}
