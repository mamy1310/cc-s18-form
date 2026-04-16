<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gift extends Model
{
    protected $fillable = ['name', 'url', 'details', 'price'];

    protected function casts(): array
    {
        return [
            'price' => 'decimal:2',
        ];
    }
}
