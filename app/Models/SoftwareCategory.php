<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SoftwareCategory extends Model
{
    protected $fillable = ['name', 'slug', 'description', 'icon', 'is_active', 'sort_order'];

    public function products()
    {
        return $this->hasMany(SoftwareProduct::class)->orderBy('sort_order');
    }}
