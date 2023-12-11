<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fire extends Model
{
    use HasFactory;

    protected $fillable = [
        'FPA_ID',
        'FIRE_NAME',
        'DISCOVERY_DATE',
        'DISCOVERY_TIME',
        'STAT_CAUSE_DESCR',
        'CONT_DATE',
        'CONT_TIME',
        'FIRE_SIZE_CLASS',
    ];

    public $timestamps = false;

    public function getDiscoveryDateAttribute($value): Carbon
    {
        return Carbon::parse(jdtojulian($value));
    }

    public function getContainedDateAttribute($value): Carbon
    {
        return Carbon::parse(jdtojulian($this->CONT_DATE));
    }
}
