@extends('layouts.main')

@section('title', 'Create Hero')

@section('content')
    <h1>My Team</h1>
    @if(isset($success) && $success)
        <div class="alert alert-success">
            Successfully created Team!
        </div>
    @elseif(isset($success) && !$success)
        <div class="alert alert-danger">
            {{$message}}
        </div>
    @endif
    <form id="teamForm" method="post" action="/myheroes/storeteam">
        {{csrf_field()}}
        <ul class="nav nav-tabs choose-side">
            <li class="nav-item">
                <a class="nav-link active" data-side="light" data-toggle="tab" href="#lightHeroes">Light</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-side="dark" data-toggle="tab" href="#darkHeroes">Dark</a>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="lightHeroes" role="tabpanel">
                @foreach($lightHeroes as $hero)
                <div class="form-group">
                    <input name="heroes[]" id="hero{{$hero->id}}" type="checkbox" class="form-check-input" value="{{$hero->id}}">
                    <label for="hero{{$hero->id}}" class="input-check-label">{{$hero->name}} (HP: {{$hero->hp}}, AP: {{$hero->attack}}, Special: {{$hero->special_ability}})</label>
                </div>
                @endforeach
            </div>
            <div class="tab-pane fade" id="darkHeroes" role="tabpanel">
                @foreach($darkHeroes as $hero)
                <div class="form-group">
                    <input name="heroes[]" id="hero{{$hero->id}}" type="checkbox" class="form-check-input" value="{{$hero->id}}">
                    <label for="hero{{$hero->id}}" class="input-check-label">{{$hero->name}} (HP: {{$hero->hp}}, AP: {{$hero->attack}}, Special: {{$hero->special_ability}})</label>
                </div>
                @endforeach
            </div>
        </div>
        <input type="hidden" value="light" name="side"/>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection

@section('javascript')
    @parent
    <script src="{{ asset('js/team.js') }}"></script>
@stop
