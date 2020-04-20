<?php

namespace App\Http\Controllers;

use App\Models\Hero;
use App\Models\HeroTeam;
use App\Models\Team;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class MyHeroesController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function myTeams()
    {
        $teams = Team::all();

        return view('myheroes.index', ['teams' => $teams]);
    }

    public function createHeroForm()
    {
        return view('myheroes.create-hero');
    }

    public function createTeamForm(Request $request)
    {
        $lightHeroes = Hero::all()->where('side', '=', 'light');
        $darkHeroes = Hero::all()->where('side', '=', 'dark');
        $params = ['lightHeroes' => $lightHeroes, 'darkHeroes' => $darkHeroes];
        if($request->has('success')) {
            $params['success'] = (bool)$request->get('success');
        }
        if($request->has('message')) {
            $params['message'] = $request->get('message');
        }
        return view('myheroes.create-team', $params);
    }

    public function storeHero(Request $request)
    {
        try {
            $hero = new Hero;
            $hero->fill($request->all());
            $hero->saveOrFail();
            return view('myheroes.create-hero', ['success' => true]);
        } catch (\Throwable $e) {
            return view('myheroes.create-hero', ['success' => false, 'message' => $e->getMessage()]);
        }
    }

    public function storeTeam(Request $request)
    {
        try {
            DB::beginTransaction();;

            $team = new Team;
            $team->side = $request->get('side');
            $team->saveOrFail();

            $team_id = $team->id;

            foreach($request->get('heroes') as $hero_id) {
                $hero = Hero::find($hero_id);
                if($hero->side !== $request->get('side')) {
                    throw new \Exception("Hero is not on the right side...");
                }
                $heroTeam = new HeroTeam;
                $heroTeam->hero_id = $hero_id;
                $heroTeam->team_id = $team_id;
                $heroTeam->saveOrFail();
            }

            DB::commit();
            return Redirect::action('MyHeroesController@createTeamForm', ['success'=>1]);
        } catch (\Throwable $e) {
            DB::rollBack();
            return Redirect::action('MyHeroesController@createTeamForm', ['success'=>0, 'message' => $e->getMessage()]);
        }
    }
}
