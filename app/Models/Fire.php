<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fire extends Model
{
    use HasFactory;

    protected $fillable = [
        'FOD_ID',
        'FPA_ID',
        'SOURCE_SYSTEM_TYPE', //federal, nonfederal, or interagency
        'SOURCE_SYSTEM',
        'LOCAL_FIRE_REPORT_ID',
        'LOCAL_INCIDENT_ID',
        'FIRE_CODE',
        'FIRE_NAME',
        'FIRE_YEAR',
        'DISCOVERY_DATE',
        'DISCOVERY_TIME',
        'STAT_CAUSE_CODE',
        'STAT_CAUSE_DESCR',
        'CONT_DATE',
        'CONT_TIME',
        'FIRE_SIZE',
        'FIRE_SIZE_CLASS',
        'LATITUDE',
        'LONGITUDE',
        'OWNER_CODE',
        'STATE',
    ];

    public function getDiscoveryDateAttribute($value)
    {
        return Carbon::parse(jdtojulian($value))->format('d/m/Y');
    }

    public function getContainedDateAttribute($value)
    {
        return Carbon::parse(jdtojulian($this->CONT_DATE))->format('d/m/Y');
    }

    //relation
    //NWCG_REPORTING_AGENCY = Active National Wildlife Coordinating Group (NWCG) Unit Identifier for the agency preparing the fire report (BIA = Bureau of Indian Affairs, BLM = Bureau of Land Management, BOR = Bureau of Reclamation, DOD = Department of Defense, DOE = Department of Energy, FS = Forest Service, FWS = Fish and Wildlife Service, IA = Interagency Organization, NPS = National Park Service, ST/C&L = State, County, or Local Organization, and TRIBE = Tribal Organization).

    //NWCG_REPORTING_UNIT_ID - unit table
}
