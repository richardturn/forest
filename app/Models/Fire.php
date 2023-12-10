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

    //relation
    //NWCG_REPORTING_AGENCY = Active National Wildlife Coordinating Group (NWCG) Unit Identifier for the agency preparing the fire report (BIA = Bureau of Indian Affairs, BLM = Bureau of Land Management, BOR = Bureau of Reclamation, DOD = Department of Defense, DOE = Department of Energy, FS = Forest Service, FWS = Fish and Wildlife Service, IA = Interagency Organization, NPS = National Park Service, ST/C&L = State, County, or Local Organization, and TRIBE = Tribal Organization).

    //NWCG_REPORTING_UNIT_ID - unit table
}
