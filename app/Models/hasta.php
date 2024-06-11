<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class hasta extends Model
{
    use HasFactory;
    protected $fillable = [
        'adi',
        'soyadi',
        'cinsiyet',
        'dogum_tarihi',
        'telefon',
        'adres',
        'email',
        'sgk',
        'tibbi_gecmis',
    ];
}
