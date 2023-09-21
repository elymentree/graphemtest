<?php

namespace App\Http\Controllers;

use App\Models\Hero;
use Illuminate\Http\Request;

class HeroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $heroes = Hero::all();
        return view('team');

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

        // VALIDATE
       $data = $request->validate(['name'=>'required','side'=>'required','hit_points'=>'required|numeric','attack'=>'required|numeric','ability'=>'required']);
       Hero::create($data);

       return redirect(url('myheroes/createteam'));

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        $hero = Hero::find($id);
        return $hero->getAttributes();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Hero $hero)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Hero $hero)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Hero $hero)
    {
        //
    }
}
