<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends LocalizableModel
{
    use HasFactory;

    /**
     * Localized attributes
     *
     * @var array
     */
    protected $localizable  = [
        'name',
        'locale'
    ];
}
