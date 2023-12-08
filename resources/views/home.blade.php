@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <table class="table">
                <thead>
                    <th>Agency</th>
                    <th>ID</th>
                    <th>Name</th>
                </thead>
                <tbody>
                    @foreach($forests as $forest)
                        <tr>
                            <td>{{ $forest->agency }}</td>
                            <td>{{ $forest->id }}</td>
                            <td>{{ $forest->name }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            {{ $forests->links() }}
        </div>
    </div>
</div>
@endsection
