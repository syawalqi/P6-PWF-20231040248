<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Category Model
 * 
 * Represents a product category in the system.
 * Each category can have multiple products.
 */
class Category extends Model
{
    // Explicitly define the table name as per assignment instructions
    protected $table = 'category';

    protected $fillable = [
        'name',
    ];

    /**
     * Relationship: One Category has many Products
     */
    public function products(): HasMany
    {
        return $this->hasMany(Product::class, 'category_id');
    }
}
