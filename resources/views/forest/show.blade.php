@extends('layouts.app')

@section('content')
<div class="container page">
    <div class="row justify-content-center">
        <div class="col">
            <table class="table">
                <thead>
                    <th scope="col">FPA ID</th>
                    <th scope="col">Fire Name</th>
                    <th>Discovery Date</th>
                    <th>Discovery Time</th>
                    <th>Cause</th>
                    <th>Contained Date</th>
                    <th>Contained Time</th>
                    <th>Fire Size Class</th>
                </thead>
                <tbody>
                    @foreach($fires as $fire)
                        <tr>
                            <td>{{ $fire->FPA_ID }}</td>
                            <td>{{ $fire->FIRE_NAME }}</td>
                            <td>{{ $fire->DISCOVERY_DATE }}</td>
                            <td>@time($fire->DISCOVERY_TIME)</td>
                            <td>{{ $fire->STAT_CAUSE_DESCR }}</td>
                            <td>{{ $fire->contained_date }}</td>
                            <td>@time($fire->CONT_TIME)</td>
                            <td>{{ $fire->FIRE_SIZE_CLASS }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            {{ $fires->links() }}
        </div>
    </div>
</div>
@endsection
