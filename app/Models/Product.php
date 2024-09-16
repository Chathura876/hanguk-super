<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Stancl\Tenancy\Database\Concerns\BelongsToTenant;

class Product extends Model
{
    use HasFactory;


    protected $fillable =
        [
            'product_name',
            'bar_code',
            'shop_id',
            'type',
            'image',
            'brand_id',
            'category_id',
            'sub_category_id',
            'add_by',
            'sale_on_hare_price',
            'enable_stock_group',
        ];

    protected static function newFactory()
    {
        return \Modules\SuperMarketPos\Database\factories\ProductFactory::new();
    }
    public function stocks()
    {
        return $this->hasMany(Stock::class, 'product_id', 'id');
    }
//    public function product()
//    {
//        return $this->belongsTo(Product::class, 'product_id');
//    }
//
//    public function stock()
//    {
//        return $this->belongsTo(Stock::class, 'stock_id');
//    }


}
