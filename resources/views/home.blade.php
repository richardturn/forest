@extends('layouts.app')

@section('content')
<div class="container page">
    <div class="row justify-content-center">
        <div class="col">
            <table class="table">
                <thead>
                    <th scope="col">Unit ID</th>
                    <th scope="col">Agency</th>
                    <th scope="col">Name</th>
                    <th scope="col">Total Fires</th>
                </thead>
                <tbody>
                    @foreach($forests as $forest)
                        <tr>
                            <td><a href="{{route('unit.show',$forest->id )}}">
                                    {{ $forest->id }}
                                </a>
                            </td>
                            <td>
                                {{ $forest->agency }}
                            </td>
                            <td>
                                <a href="{{ route('forest.show', $forest->name) }}">
                                {{ $forest->name }}
                                </a>
                            </td>
                            <td>
                                @number($forest->total_fires)
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            {{ $forests->links() }}
        </div>
    </div>
</div>
@endsection
