@extends('layouts.app')

@section('content')
<div class="container page">
    <div class="row justify-content-center">
        <div class="col page">
            <div class="form-group mb-3">
                <label for="UnitId"><span>ID</span></label><br>
                {{ $unit->UnitId }}
            </div>

            <div class="form-group  mb-3">
                <label for="Name"><span >Name</span></label><br>
                {{ $unit->Name }}
            </div>

            <div class="form-group  mb-3">
                <label for="UnitType"><span>Type</span></label><br>
                {{ $unit->UnitType }}
            </div>

            <div class="form-group  mb-3">
                <label for="WildlandRole "><span>Role</span></label><br>
                {{ $unit->WildlandRole }}
            </div>

        </div>
    </div>
</div>
@endsection
