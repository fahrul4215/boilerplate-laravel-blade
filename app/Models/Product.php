<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'slug',
        'stock',
        'price',
        'discount',
        'composition',
        'weight',
        'status',
        'description',
        'category_id'
    ];

    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }

    public function category()
    {
        return $this->belongsTo(CategoryProduct::class);
    }

    public function transactionProduct()
    {
        return $this->belongsTo(TransactionProduct::class);
    }

    /**
     * Scope a query to only include active status
     *
     * @param  \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }

    /**
     * Scope a query to only include on stock
     *
     * @param  \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeOnStock($query)
    {
        return $query->where('stock', '>', 0);
    }

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = ['url', 'discounted_price'];

    /**
     * Get the url
     *
     * @return string
     */
    public function getUrlAttribute()
    {
        return route('product', ['category' => $this->category->slug ?? '', 'slug' => $this->slug ?? '']);
    }

    public function getDiscountedPriceAttribute()
    {
        return $this->price - ($this->price * $this->discount) / 100;
    }
}
