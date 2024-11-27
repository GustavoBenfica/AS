<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PokemonController extends Model
{
    public function index()
    {
        $pokemon = Pokemon::all();
        return view('pokemon.index', compact('pokemon'));
    }

    public function create()
    {
        return view('pokemon.create');
    }

    public function store(Request $request)
    {
        Pokemon::create($request->all());
        return redirect('pokemon')->with('success', 'Pokemon created successfully.');
    }

    public function edit($id)
    {
        $pokemon = Pokemon::findOrFail($id);
        return view('pokemon.edit', compact('pokemon'));
    }

    public function update(Request $request, $id)
    {
        $pokemon = Pokemon::findOrFail($id);
        $pokemon->update($request->all());
        return redirect('pokemon')->with('success', 'Pokemon updated successfully.');
    }

    public function destroy($id)
    {
        $pokemon = Pokemon::findOrFail($id);
        $pokemon->delete();
        return redirect('pokemon')->with('success', 'Pokemon deleted successfully.');
    }

}
