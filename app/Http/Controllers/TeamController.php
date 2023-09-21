<?php

namespace App\Http\Controllers;

use App\Models\Hero;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        // $teams = Team::all();


        $teams = DB::table('teams as t')
            ->select('t.id','t.name','t.side',DB::raw('group_concat(h.id) as allheroes'),DB::raw('group_concat(h.name) as allheroname'),DB::raw('SUM(h.attack) as power'))
            ->leftJoin('teamheroes as th','th.team_id','=','t.id')
            ->leftJoin('heroes as h','h.id','=','th.hero_id')
            ->groupBy('t.id')
            ->get();

        // dd($teams);
        return view('team',['teams'=>$teams]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
       $data = $request->validate(['name'=>'required','side'=>'required']);
       $newData = Team::create($data);

        $teamHeroData = [];
        if(!empty($request->hero)){
            foreach($request->hero as $eachHero){
                $teamHeroData[] = ['team_id'=>$newData->id,'hero_id'=>$eachHero];
            }
        }


        //INSERT TO MULTIPLE TABLES
        DB::table('teamheroes')->insert($teamHeroData);

        return redirect(url('/myheroes'));

    }

    /**
     * Display the specified resource.
     */
    public function show(Team $team)
    {
        //
        $heroes = Hero::all();
        return view('createteam',['heroes'=>$heroes]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Team $team)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Team $team)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Team $team)
    {
        //
    }

    public function details($id)
    {

        $team = DB::table('teams as t')
            ->select('h.*',DB::raw("IF(h.side='light' AND ability = 'sword', hit_points+attack+10,hit_points+attack+5) as hero_power"))
            ->join('teamheroes as th','th.team_id','=','t.id')
            ->join('heroes as h','h.id','=','th.hero_id')
            ->where('t.id',$id)
            ->get();

        return count($team)?$team:'NO HEROES ASSIGNED ON THIS TEAM';
    }
}
