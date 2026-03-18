<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SoftwareProductImage extends Model
{
    protected $fillable = ['software_product_id', 'image_path'];

    public function product()
    {
        return $this->belongsTo(SoftwareProduct::class, 'software_product_id');
    }}
