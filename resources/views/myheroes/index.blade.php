@extends('layouts.main')

@section('title', 'My Teams')

@section('content')
    <h1>My Teams</h1>

    @foreach($teams as $team)
        <h4>{{ucfirst($team->side)}}</h4>
        <table class="table table-light">
            <thead>
                <tr>
                    <th>Hero</th>
                    <th>HP</th>
                    <th>AP</th>
                    <th>Special Ability</th>
                </tr>
            </thead>
            <tbody>
                @foreach($team->heroes as $hero)
                    <tr>
                        <td>{{$hero->name}}</td>
                        <td>{{$hero->hp}}</td>
                        <td>{{$hero->attack}}</td>
                        <td>{{$hero->special_ability}}</td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="4">Combined Power: {{$team->totalStrength()}}</td>
                </tr>
            </tfoot>
        </table>
    @endforeach
@endsection
