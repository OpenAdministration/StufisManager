<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $fillable = [
        'instance_id',
        'name',
        'result',
        'log',
        'diff' // json
    ];

    protected function casts(): array
    {
        return [
            'diff' => 'array',
        ];
    }

}
