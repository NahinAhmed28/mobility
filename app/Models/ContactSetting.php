<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactSetting extends Model
{
    use HasFactory;

    protected $table = 'contact_settings';

    protected $fillable = ['phone','email','address','qr_image_path','socials_json'];

    protected $casts = [
        'socials_json' => 'array',
    ];
}
