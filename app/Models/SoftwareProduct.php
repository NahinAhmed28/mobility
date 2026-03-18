<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SoftwareProduct extends Model
{
    protected $fillable = ['software_category_id', 'title', 'slug', 'description', 'details_text', 'is_active', 'sort_order'];

    public function category()
    {
        return $this->belongsTo(SoftwareCategory::class, 'software_category_id');
    }

    public function images()
    {
        return $this->hasMany(SoftwareProductImage::class);
    }}
