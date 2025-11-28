<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cerveja extends Model{
    use HasFactory;
    protected $fillable = [
        'name',
        'brand',
        'style',
        'abv',
        'ibu',
        'embalagem',
        'artesanal',
        'descricao',
    ];
    protected $casts = [
        'artesanal' => 'boolean', // Converte 0/1 para true/false automaticamente
        'abv' => 'float',         // Garante que venha como número decimal
        'ibu' => 'integer',
    ];
}