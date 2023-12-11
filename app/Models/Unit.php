<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    use HasFactory;

    protected $fillable = [
        'UnitId',
        'Name',
        'WildlandRole',

    ];

    protected $table = 'NWCG_UnitIDActive_20170109';

    protected $primaryKey = 'UnitId';

    protected $keyType = 'string';
}
