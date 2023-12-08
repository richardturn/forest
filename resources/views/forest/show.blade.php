@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <table class="table">
                <thead>
                    <th>Code</th>
                    <th>Name</th>
                    <th>Year</th>
                    <th>Date</th>
                    <th>DaTimete</th>
                    <th>Fire Size</th>
                    <th>Fire Size Class</th>
                    <th>Owner</th>
                    <th>State</th>
                </thead>
                <tbody>
                    @foreach($fires as $fire)
                        <tr>
                            <td>{{ $fire->FIRE_CODE }}</td>
                            <td>{{ $fire->FIRE_NAME }}</td>
                            <td>{{ $fire->FIRE_YEAR }}</td>
                            <td>{{ $fire->DISCOVERY_DATE }}</td>
                            <td>{{ $fire->DISCOVERY_TIME }}</td>
                            <td>{{ $fire->FIRE_SIZE }}</td>
                            <td>{{ $fire->FIRE_SIZE_CLASS }}</td>
                            <td>{{ $fire->OWNER_DESCR }}</td>
                            <td>{{ $fire->STATE }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            {{ $fires->links() }}
        </div>
    </div>
</div>
@endsection
