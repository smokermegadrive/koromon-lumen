<?php

namespace App\Http\Controllers;

use App\Monster;
use Illuminate\Http\Request;

class KoromonController extends Controller
{

    public function showAllMonsters()
    {
        return response()->json(Monster::all());
    }

    public function showOneMonster($id)
    {
        return response()->json(Monster::find($id));
    }

    public function create(Request $request)
    {
        $monster = Monster::create($request->all());

        return response()->json($monster, 201);
    }

    public function update($id, Request $request)
    {
        $monster = Monster::findOrFail($id);
        $monster->update($request->all());

        return response()->json($monster, 200);
    }

    public function delete($id)
    {
        Monster::findOrFail($id)->delete();
        return response('Deleted Successfully', 200);
    }
}