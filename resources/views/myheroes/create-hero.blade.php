@extends('layouts.main')

@section('title', 'Create Hero')

@section('content')
    <h1>Create a Hero!</h1>
    @if(isset($success) && $success)
        <div class="alert alert-success">
            Successfully created Hero!
        </div>
    @elseif(isset($success) && !$success)
        <div class="alert alert-danger">
            {{$message}}
        </div>
    @endif
    <form method="post" action="/myheroes/storehero">
        {{csrf_field()}}

        <div class="form-group">
            <label for="name">Super Hero Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="form-group">
            <h2>Side</h2>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="side" id="lightRadio" value="light" checked>
                <label class="form-check-label" for="lightRadio">
                    Light
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="side" id="darkRadio" value="dark">
                <label class="form-check-label" for="darkRadio">
                    Dark
                </label>
            </div>
        </div>
        <div class="form-group">
            <label for="hp">Hit Points</label>
            <input type="number" required class="form-control" id="hp" name="hp" min="0" step="1">
        </div>
        <div class="form-group">
            <label for="attack">Attack Power</label>
            <input type="number" required class="form-control" id="attack" name="attack" min="0" step="1">
        </div>
        <div class="form-group">
            <label for="special_ability">Special Ability</label>
            <input type="text" required class="form-control" id="special_ability" name="special_ability">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
